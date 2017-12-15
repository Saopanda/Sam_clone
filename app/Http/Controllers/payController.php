<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class payController extends Controller
{

	// 密钥
	protected $config;


    public function create($id)
    {
    	//订单 id
    	$did = $id;
    	//获取订单信息
    	$order = DB::table('order')->where('orderid',$did)->first();
    	//订单总价
    	$zongjia = $order->sum_price;
    	//订单商品
    	$goods = DB::table('order_goods')->where('order',$order->id)->first();
    	$goodsname = DB::table('goods')->where('id',$goods->goodsid)->value('title');
    	//支付接口
    	$config_biz = [
            'out_trade_no' => $did,
            'total_amount' => $zongjia,
            'subject'      => $goodsname,
        ];

    }


    //支付成功页
    public function zfsuccess(){
        
        return view('home.zfsuccess');
    }
}
