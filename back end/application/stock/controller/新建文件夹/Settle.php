<?php
namespace app\stock\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Config;
use think\Session;

class Settle extends Controller
{


    public function run() {
        $dateTime = $this->request->param('param');
        $time = date('Y-m-d H:i:s', $dateTime);
        $stocks = Db::name('product')->where(array('status'=>1))->column('price', 'code');
        $sell_time = date('Y-m-d H:i:s', strtotime($time) - 1);
        $orders = Db::name('order')->where(array('status'=>1, 'sell_time'=> array('elt', $time)))->select();
       
        foreach ($orders as $order) {
            
            $nowPrice = $stocks[$order['p_code']];
            $uorder = array('id'=>$order['id'], 'sell_price' => $nowPrice, 'status'=>3, 'user_id'=>$order['user_id']);
            
            if ($nowPrice > 0) {
                
                $win = false;
                
                if (($order['o_style'] == 1 && $nowPrice > $order['buy_price']) || ($order['o_style'] == 2 && $nowPrice < $order['buy_price'])) {
                    $win = true;
                } else {
                    $win = false;
                }
                
                $ukong = get_user_byid($order['user_id'], 'kong_style');
                $all_kong = Config::get('site.play_type'); 
                if ($order['kong_type'] > 0 || $ukong > 0 || $all_kong > 0) {
                    $kong = $order['kong_type'] > 0 ? $order['kong_type'] : $ukong;
                    if ($kong == 1 || $all_kong == 1) {//赢
                        if (!$win)
                            $uorder['sell_price'] = $this->getPrice($order['buy_price'], $nowPrice, $order['o_style'], 1);
                        $win = true;
                    } elseif ($kong == 2 || $all_kong == 2) {//亏
                        if ($win)
                            $uorder['sell_price'] = $this->getPrice($order['buy_price'], $nowPrice, $order['o_style'], 0);
                        $win = false;
                    }
                }
                
                if ($win) {
                    $uorder['ploss'] = round($order['buy_money'] * (100 + $order['win_profit'])/100, 2);
                    $uorder['end_loss'] = $order['win_profit'];
                    $uorder['end_profit'] = round($order['buy_money'] *  $order['win_profit']/100, 2);
                    $uorder['is_win'] = 1;
                } else {
                    $uorder['ploss'] = $order['buy_money'] - round($order['buy_money'] *  $order['lose_profit']/100, 2);
                    $uorder['end_loss'] = 0 - $order['lose_profit'];
                    $uorder['end_profit'] = 0 - round($order['buy_money'] *  $order['lose_profit']/100, 2);
                    $uorder['is_win'] = 0;
                }
                
                updateOrder($uorder, $uorder['ploss'], $uorder['is_win'], $order['id']);
                echo $order['id'].PHP_EOL;
            }
            
            
        }
    }

    
    
    private function getPrice($buy, $now, $style, $type) {
        $cha = abs($now - $buy);
        $FloatLength = getFloatLength((float)$now);
        $_s_rand = rand(1, 10) / pow(10, $FloatLength - 1);
        //赢
        if ($type == 1) {
            //买涨
            if ($style == 1) {
                $price = $buy + $_s_rand;
            } elseif ($style == 2) {
                $price = $buy - $_s_rand;
            }
        } else {
            //买涨
            if ($style == 1) {
                $price = $buy - $_s_rand;
            } elseif ($style == 2) {
                $price = $buy + $_s_rand;
            }
        }
        return $price;
    }
    
}