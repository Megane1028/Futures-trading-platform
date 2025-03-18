<?php

namespace app\api\controller;

use think\Cache;
use think\Config;
use think\Db;

class Index extends PublicBase
{

    public function index()
    {
        $hui_lv = cache('day_hui_lv');
        if (empty($hui_lv)){
            $hui_lv = '7.24';
        }

        $site = Config::get('site');
        // 判断是否在交易时间内
        if(!empty($site['trade_time'])){
            $trade_timeStr = $site['trade_time'];
            $trade_time = explode("-",$trade_timeStr);
            $startTimeStr = $trade_time[0];
            $startTime = strtotime(date("Y-m-d {$startTimeStr}:00"));
            $endTimeStr = $trade_time[1];
            $endTime = strtotime(date("Y-m-d {$endTimeStr}:00"));
            $nowTime = time();
            if(!($nowTime >= $startTime && $nowTime <= $endTime)){
                $is_b = 1;
            }else{
                $is_b = 0;
            }
        }else{
            $startTime = '';
            $endTime = '';
            $is_b = 0;
        }

        $notice = Db::name('notice')->order('id desc')->find();
        $user = Db::name('user')->where('id',getUid())->find();
        $name = "游客";
        $id= 0;
        if (!empty($user)) {
            $name = $user["real_name"];
            $id = $user["id"];
        }
$info = "账号：" . $user["account"]. ",姓名:" . $name . ",可用余额:" . $user["money"];
        
        $data = [
            'kefu_url' => Config::get('site.kefu_url') . "?name=$info&id=$id",
//            'web_icon' => Config::get('site.web_icon'),
            'gg_title' => $notice['title']?:'',
            'gg_con' => $notice['short_content']?:'',
            'gg_time' => $notice['ctime']?:'',
            'hui_lv' => $hui_lv,
            'b_start_time' => $startTimeStr,
            'b_end_time' => $endTimeStr,
            'b_is' => $is_b,

        ];
        return ApiSuccess('',$data);

    }

    // 单个商品的走势数据
    public function goods_stock()
    {
        $param = $this->request->param();

//
//        "zh-TW": "繁體中文",
//  "zh-CN": "简体中文",
//  "ja": "日本語",
//  "th": "ภาษาไทย",
//  "vi": "Tiếng Việt",
//  "id": "Indonesia",
//  "ko": "한국어",
//  "fr": "Français"


//        1min : 1分钟
//        5min : 5分钟
//        30min : 30分钟
//        1hour : 1小时
//        1day : 1天
//        1week : 1星期

        $stocks = array();
//        $type = Config::get('site.api_type');
//        $trade_type = Config::get('site.trade_type');
//        $apiUrl = Config::get('site.api_url_'.$type);
//        if ($param['resolution'] == '1D')
//            $param['resolution'] = '1day';
//        if ($param['resolution'] == '1W')
//            $param['resolution'] = '1week';
//        if ($param['resolution'] == '60min')
//            $param['resolution'] = '1hour';
        $key = $param['symbol'].'_stock_'.$param['resolution'];
        $stocks = array_values(unserialize(Cache::get($key)));
        //var_dump($key);

        return ApiSuccess('',$stocks);
    }

    // 商品列表
    public function goods()
    {
        $stocks = getStock(array('status'=>1, 'is_open'=>1));

        // var_dump($stocks);

        foreach ($stocks as $key=>&$stock) {
            $zf = 0;
            if (isset($stock['open_price']) && $stock['open_price'] > 0)
                $zf = round(($stock['price'] - $stock['open_price'])*100/$stock['open_price'], 2);
            $stock['vol'] = round($stock['vol']/10000, 4);
            $trade_type = Config::get('site.trade_type');
            if ($trade_type != 'qc' && $stock['cid'] == 1) {
                $stock['codename'] = $stock['code'].'/'.strtoupper($trade_type);
            } else {
                $stock['codename'] = $stock['code'];
            }

            $stock['zf'] = $zf;
            if (isset($stock['open_price']) && $stock['open_price'] > 0){
                $stock['zf_d'] = bcsub($stock['price'],$stock['open_price'],2);

            }else{
                $stock['zf_d'] = '0.00';
            }
            if ($zf > 0){
                $stock['is_z'] = 1;
            }else{
                $stock['is_z'] = 2;
            }
            $stock['zf'] .= '%';
        }
        return ApiSuccess('',$stocks);

    }

    // 商品详情
    public function goods_dec()
    {
        $stocks = getStock(array('status'=>1, 'is_open'=>1,'id' => input('id')));

        // var_dump($stocks);

        foreach ($stocks as $key=>&$stock) {
            $zf = 0;
            if (isset($stock['open_price']) && $stock['open_price'] > 0)
                $zf = round(($stock['price'] - $stock['open_price'])*100/$stock['open_price'], 2);
            $stock['vol'] = round($stock['vol']/10000, 4);
            $trade_type = Config::get('site.trade_type');
            if ($trade_type != 'qc' && $stock['cid'] == 1) {
                $stock['codename'] = $stock['code'].'/'.strtoupper($trade_type);
            } else {
                $stock['codename'] = $stock['code'];
            }

            $stock['zf'] = $zf;
            if (isset($stock['open_price']) && $stock['open_price'] > 0){
                $stock['zf_d'] = bcsub($stock['price'],$stock['open_price'],2);

            }else{
                $stock['zf_d'] = '0.00';
            }
            if ($zf > 0){
                $stock['is_z'] = 1;
            }else{
                $stock['is_z'] = 2;
            }
            $stock['zf'] .= '%';
        }

        if (!empty($stocks[0])){
            $stocks = $stocks[0];
            $stock = getStockByCode($stocks['code']);
            $play_rule = json_decode($stock['play_rule'], true);
            $timeList = array();
            foreach ($play_rule as $key=>$val) {
                $time = $val['time'];
                $days = intval($time/(3600*24));
                $hours = intval(($time%(3600*24))/3600);
                $minite = intval(($time%3600)/60);
                $second = $time%60;
                $time_str = ($days > 0 ? $days.'天':'').($hours > 0 ? $hours.'时':'').($minite > 0 ? $minite.'分钟':'').($second > 0 ? $second.'秒':'');
                $time_str = $time.'秒';
                if ($val['win'] > 100){
                    $profit_ratio = $val['win'] - 100;
                }else{
                    $profit_ratio = $val['win'];
                }
                $timeList[] = array('seconds'=>$val['time'],'seconds_desc'=>$time_str, 'profit_ratio'=>$profit_ratio);
            }
            $stocks['timeList'] = $timeList;
            $stocks['price'] = $stock['price'];
            $stocks['open_price'] = $stock['open_price'];
            $stocks['price_high'] = $stock['price_high'];
            $stocks['price_low'] = $stock['price_low'];
            $stocks['vol'] = $stock['vol'];
        }

        return ApiSuccess('',$stocks);

    }

}