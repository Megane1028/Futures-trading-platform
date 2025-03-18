<?php
namespace app\stock\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Config;
use think\Session;
use think\Cache;

class Bian extends Controller
{
    private $_apiUrl = 'https://api.binance.com/api/v3';
    private $_tradeType = '';
    private $_apiType = '';
    
    public function _initialize() {
        $type = Config::get('site.api_type');
        $this->_tradeType = Config::get('site.trade_type');
        $this->_apiType = $type;
    }
    
    public function getUsdt() {
        $url = 'http://api.zb.live/data/v1/ticker?market=usdt_qc';
        $result = stock_request($url);
        if ($result['ticker']['last']) {
            if ($result['ticker']['last'] > 0) {
                Db::name('config')->where(array('name'=>'usdt_cny_rate'))->setField('value', $result['ticker']['last']);
            }
        }
        
    }
    
    public function start() {
        
        $code = 'BTC';
        $type = '1M';
        $start = date('Y-m-d H:i:s', time() - 60*500 + 1);
        $end = date('Y-m-d H:i:s', time());
        $codeList = array();
        $stocks = Db::name('product')->where(array('status'=>1, 'is_open'=>1, 'cid'=>1))->select();
        foreach ($stocks as $stock) {
            $codeList[] = $stock['code'].'USDT';
        }
     
        $url = $this->_apiUrl . "/ticker/24hr";  
        $result = stock_request($url);

        $stockData = array();
        foreach ($result as $key=>$val) {
            if (in_array($val['symbol'], $codeList)) {
                $stockData[] = $val;
            }
        }
        fh($stockData);
    }
    
    /**
     * 获取最新K线数据
     */
    public function runLastData() {
        
        $type = $this->request->param('type');
        
        $types = array('1min', '5min', '30min', '1hour', '1day');
        
        if (!in_array($type, $types)) {
            return ;
        }
        
        $time = time();
        $cmds = array();
        
        $path = dirname(dirname(dirname(dirname(__FILE__)))).'/stock.php ';
        
        $stocks = Db::name('product')->where(array('status'=>1, 'is_open'=>1, 'cid'=>1))->select();
        
        foreach ($stocks as $key=>$stock) {
            $code = $stock['code'];
            $cmds[] = 'php '.$path.'  Bian/getLastData/type/'.$type.'/code/'.$code;
        }
      
        pcntl_signal(SIGCHLD, SIG_IGN);	//如果父进程不关心子进程什么时候结束,子进程结束后，内核会回收。
        foreach ($cmds as  $cmd) {
            $pid = pcntl_fork();	//创建子进程
            //父进程和子进程都会执行下面代码
            if ($pid == -1) {
                //错误处理：创建子进程失败时返回-1.
                die('could not fork');
            } else if ($pid) {
                //父进程会得到子进程号，所以这里是父进程执行的逻辑
                //如果不需要阻塞进程，而又想得到子进程的退出状态，则可以注释掉pcntl_wait($status)语句，或写成：
                pcntl_wait($status, WNOHANG); //等待子进程中断，防止子进程成为僵尸进程。
            } else {
                //子进程得到的$pid为0, 所以这里是子进程执行的逻辑。
                echo shell_exec($cmd);
                exit(0) ;
            }
        }
        exit(0) ;
    }
    
    
    /**
     * 获取最新价数据脚本
     */
    public function runStock() {
        $stocks = Db::name('product')->where(array('status'=>1, 'is_open'=>1, 'cid'=>1))->select();
        $time = time();
        $cmds = array();
        $path = dirname(dirname(dirname(dirname(__FILE__)))).'/stock.php ';
        
        $runObj = array();
        foreach ($stocks as $key=>$val) {
            $runObj[] = $val['code'].'USDT';
        }
        
        foreach ($runObj as $key=>$val) {
            $cmds[] = 'php '.$path.'  Bian/getStock/code/'.$val;
        }
        
        pcntl_signal(SIGCHLD, SIG_IGN);	//如果父进程不关心子进程什么时候结束,子进程结束后，内核会回收。
        foreach ($cmds as  $cmd) {
            $pid = pcntl_fork();	//创建子进程
            //父进程和子进程都会执行下面代码
            if ($pid == -1) {
                //错误处理：创建子进程失败时返回-1.
                die('could not fork');
            } else if ($pid) {
                //父进程会得到子进程号，所以这里是父进程执行的逻辑
                //如果不需要阻塞进程，而又想得到子进程的退出状态，则可以注释掉pcntl_wait($status)语句，或写成：
                pcntl_wait($status, WNOHANG); //等待子进程中断，防止子进程成为僵尸进程。
            } else {
                //子进程得到的$pid为0, 所以这里是子进程执行的逻辑。
                echo shell_exec($cmd);
                exit(0) ;
            }
        }
        exit(0);
    }

    /**
     * 获取商品价格信息
     */
    public function getStock() {
        
        $code = $this->request->param('code');
        
        $url = $this->_apiUrl . "/ticker/24hr?symbol=".$code;
        $result = stock_request($url);
        if ($result) {
            $code = str_replace('USDT', '', $code);
            $result['code'] = $code;
            $res = $this->getFormat($result);
            if ($res) {
                Cache::set($code.'_stock', serialize($res));
                echo $code.PHP_EOL;
            }
        }
       
        
    }
    
    
    /**
     * 获取最新K线数据
     * @return boolean
     */
    public function getLastData() {
        
        $code = $this->request->param('code');
        
        $type = $this->request->param('type');
        
        if (!in_array($type, array('1min', '5min', '30min', '1hour', '1day'))) {
            return false;
        }
        $map = array('1min'=>'1m', '5min'=>'5m', '30min'=>'30m', '1hour'=>'1h', '1day'=>'1d');
        
        $limit = 500;
        if ($type == '1min')
            $limit = 1000;
        
        $url = $this->_apiUrl . "/klines?symbol=".$code."USDT&interval=".$map[$type]."&limit=".$limit;
        
        echo $url.PHP_EOL;
        $result = stock_request($url);
        $data = $this->getFormatLine($result, $code);

        if ($data) {
            $lastData =  array_slice($data, -1, 1);
            if ($lastData[0]) {
                $res = Cache::set($code.'_stock_new_'.$type, serialize($lastData[0]));
                if ($res)
                    echo $code.'_stock_new_'.$type.PHP_EOL;
                    
            }
            //存储K线行情数据
            $res = Cache::set($code.'_stock_'.$type, serialize($data));
            if ($res)
                echo $code.'_stock_'.$type.PHP_EOL;
        }

        
    }
    
    
    /**
     * 获取格式化K线数据
     * @param unknown $data
     * @return boolean|unknown[][]|mixed[][]
     */
    private function getFormatLine($data) {

        $result = array();
        
        if (!data)
            return false;
        foreach ($data as $key=>$val) {
            $time = $val[0];
            $result[$time] = array(
                'time' => $time,
                'open' => $val[1],
                'close' => $val[4],
                'high' => $val[2],
                'low' => $val[3],
                'volume' => $val[5],
            );
        }
        return $result;
    }
    
    
   
    
    
    /**
     * 格式化最新数据
     * @param unknown $data
     * @param unknown $code
     * @return boolean|unknown[]|string[]|NULL[]|mixed[]|boolean[]
     */
    private function getFormat($data) {

        $result = array();
        if (!$data)
            return false;
        $code = $data['code'];
        $result['code'] = $code;
        $result['price_high'] = $data['highPrice'];
        $result['price_low'] = $data['lowPrice'];
        $result['price'] = $data['lastPrice'];
        $result['vol'] = $data['volume'];
        $result['price_update'] = date('Y-m-d H:i:s');
        $result['open_price'] = $data['openPrice'];
        $result['time'] = date('Y-m-d H:i:s', $data['closeTime']/1000);
        $result['price_zf'] = $data['priceChangePercent'];
        if ($result)
            Db::name('product')->where(array('code'=>$code))->update($result);
        return $result;
    }
    
    
    /**
     * 获取24H前信息
     * @param unknown $code
     * @return mixed|boolean
     */
    private function get24HData($code) {
        
        $key = $code.'_stock_open';
        $openPrice = 0;
        $history = unserialize(Cache::get($key));
        $time = strtotime(" -24 hours", strtotime(date('Y-m-d H:i').':00'))*1000;
        if (isset($history[$time])) {
            $openPrice = $history[$time]['open'];
        }
        
        if ($openPrice > 0) {
            return $openPrice;
        }
        return false;
    }
    
    
    
}