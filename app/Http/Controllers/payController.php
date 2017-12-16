<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pay;
use DB;
class payController extends Controller
{

	// 支付
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
    	$order = [
            'out_trade_no' => $did,
            'total_amount' => $zongjia,
            'subject'      => $goodsname,
        ];

        return Pay::driver('alipay')->gateway('web')->pay($order);

    }

    // 订单创建成功,选择支付方式
    public function zhifu(Request $request)
    {
        // 站点设置
        $site = DB::table('samsite')->where('weizhi','index')->first();
        // 结束
        $data = $request->except('_token','goods','cartid');
        $goods = $request->input('goods');
        $zongjia = 0;
        foreach($goods as $k=>$v){
            //查找单价
            $price = DB::table('goods')->where('id',$v['goodsid'])->value('price');
            $goods[$k]['price'] = $price;
            //计算总价
            $zongjia += floatval($price)*$v['num'];
        }
        $data['orderid'] = '0471'.date('ymdhis').session('user_id').time();
        $data['userid'] = session('user_id');
        $data['sum_price'] = $zongjia;
        $data['dd_status'] = 0;
        $data['date'] = date('y-m-d h:i:s');
        $orderid = DB::table('order')->insertGetid($data);
        foreach ($goods as $key => $value) {
            $goods[$key]['order'] = $orderid;
        }
        $rs = DB::table('order_goods')->insert($goods);
        if($rs){
            // 订单创建成功
            DB::table('carts')->where('id',$request->cartid)->delete();
            return view('pay.payment',['bm'=>$data['orderid'],'site'=>$site]);
        }else{
            // 失败
            return back();
        }
    }


    //支付结果页 - 同步数据
    public function info(Request $request)
    {
        // $pay = new Pay($this->config);
        // dd($request->all());
        // return Pay::driver('alipay')->gateway('web')->verify($request->all());



        $orderid = $request->input('out_trade_no');
        $zt = DB::table('order')->where('orderid',$orderid)->value('dd_status');
        return view('pay.info',compact('zt'));
    }
    //支付结果 - 异步数据
    public function info2(Request $request)
    {
        // $pay = new Pay($this->config);

        // if ($pay->driver('alipay')->gateway()->verify($request->all())) {
        //     // 请自行对 trade_status 进行判断及其它逻辑进行判断，在支付宝的业务通知中，只有交易通知状态为 TRADE_SUCCESS 或 TRADE_FINISHED 时，支付宝才会认定为买家付款成功。 
        //     // 1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号； 
        //     // 2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额）； 
        //     // 3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）； 
        //     // 4、验证app_id是否为该商户本身。 
        //     // 5、其它业务逻辑情况
        //     file_put_contents(storage_path('notify.txt'), "收到来自支付宝的异步通知\r\n", FILE_APPEND);
        //     file_put_contents(storage_path('notify.txt'), '订单号：' . $request->out_trade_no . "\r\n", FILE_APPEND);
        //     file_put_contents(storage_path('notify.txt'), '订单金额：' . $request->total_amount . "\r\n\r\n", FILE_APPEND);
        // } else {
        //     file_put_contents(storage_path('notify.txt'), "收到异步通知\r\n", FILE_APPEND);
        // }
        $orderid = $request->input('orderid');
    	$rs = DB::table('order')->where('orderid',$orderid)->update(['dd_status'=>1]);
        if($rs){
        	echo "success";
        }
        // return view('pay.info');
    }
}
