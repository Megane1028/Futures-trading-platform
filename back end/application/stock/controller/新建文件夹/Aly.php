<?php
namespace app\stock\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Config;
use think\Session;
use think\Cache;

class Aly extends Controller
{
   // private $_apiUrl = 'http://alirm-com.konpn.com';

   private $_apiUrl = 'https://api-ddc-wscn.awtmt.com'; 
   
    
    private $_tradeType = '';
    private $_apiType = '';
    
    public function _initialize() {
        $type = Config::get('site.api_type');
        $this->_tradeType = Config::get('site.trade_type');
        $this->_apiType = $type;
    }
    
    public function start() {
        
        $code = 'BTC';
        $type = '1M';
        $start = date('Y-m-d H:i:s', time() - 60*500 + 1);
        $end = date('Y-m-d H:i:s', time());
        
        $url = $this->_apiUrl . "/query/comlstkm?fromtick=".time()."&period=1M,5M&symbol=".$code;
        $result = stock_request($url);
        fh($result['Obj'][0]);
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
        
        $stocks = Db::name('product')->where(array('status'=>1, 'is_open'=>1, 'cid'=>2))->select();
        
        foreach ($stocks as $key=>$stock) {
            $code = $stock['code'];
            $cmds[] = 'php '.$path.'  Aly/getLastData/type/'.$type.'/code/'.$code;
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
        
        
        
        $stocks = Db::name('product')->where(array('status'=>1, 'is_open'=>1, 'cid'=>2))->select();
        $time = time();
        $cmds = array();
        $path = dirname(dirname(dirname(dirname(__FILE__)))).'/stock.php ';
        
        $runObj = array();
        foreach ($stocks as $key=>$val) {
            $runObj[floor($key/10)][] = $val['code'];
        }
        
        foreach ($runObj as $key=>$val) {
            $cmds[] = 'php '.$path.'  Aly/getStock/code/'.implode(',', $val);
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
       // $url = $this->_apiUrl . "/query/comrms?symbols=".$code;
        
    // $url = $this->_apiUrl . "/query/comrms?symbols=".$code;  
     var_dump($code);
     
     $url = $this->_apiUrl . "fields=symbol,en_name,prod_name,last_px,px_change,px_change_rate,high_px,low_px,open_px,preclose_px,market_value,turnover_volume,turnover_ratio,turnover_value,dyn_pb_rate,amplitude,dyn_pe,trade_status,circulation_value,update_time,price_precision,week_52_high,week_52_low,static_pe,source&prod_code=".$code.".OTC";
     
     
     
        
        $result = stock_request($url);
        
       // var_dump($result);
        
        if (!isset($result['Obj']) || !$result['Obj'])
            return ;
        $data = $result['Obj'];
        foreach ($data as $key=>$val) {
            
            $res = $this->getFormat($val);
            $code = $res['code'];

            if ($res) {
                Cache::set($code.'_stock', serialize($res));
                echo $code.PHP_EOL;
            }
            echo $stock['code'].PHP_EOL;
            
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
        $map = array('1min'=>'1M', '5min'=>'5M', '30min'=>'30M', '1hour'=>'1H', '1day'=>'D');
        
        $url = $this->_apiUrl . "/query/comkm?pidx=1&period=".$map[$type]."&psize=500&withlast=1&symbol=".$code;
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
        
        if (!isset($data['Obj']) || !$data['Obj'])
            return false;
        foreach ($data['Obj'] as $key=>$val) {
            $time = $val['Tick'] * 1000;
            $result[$time] = array(
                'time' => $time,
                'open' => $val['O'],
                'close' => $val['C'],
                'high' => $val['H'],
                'low' => $val['L'],
                'volume' => $val['V'],
            );
        }
        return array_reverse($result);
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
        $code = $data['S'];
        $result['code'] = $code;
        $result['price_high'] = $data['H'];
        $result['price_low'] = $data['L'];
        $result['price'] = $data['P'];
        $result['vol'] = $data['V'];
        $result['price_update'] = date('Y-m-d H:i:s');
        $result['open_price'] = $data['O'];
        $result['time'] = date('Y-m-d H:i:s', $data['Tick']);
        $result['price_zf'] = $data['ZF'];

        if ($result)
            $res = Db::name('product')->where(array('code'=>$code))->update($result);
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