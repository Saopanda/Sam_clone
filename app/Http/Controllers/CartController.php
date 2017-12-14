<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    /**
     *  购物车列表
     */
    public function index()
    {
        // 站点设置
        $site = DB::table('samsite')->where('weizhi','index')->first();
        $site->gwc = '购物车';
        // 结束
        if(session('user_name')){
            $userid = DB::table('user')->where('name',session('user_name'))->value('id');
            $rs = DB::table('carts')->where('userid',$userid)->select('id','goodsid','num')->get();
            foreach($rs as $k=>$v){
                $v->goods = DB::table('goods')->where('id',$v->goodsid)->select('title','price','content')->first();
                $v->goods_pic = DB::table('goods_pic')->where(['goodsid'=>$v->goodsid,'img_lx'=>2])->select('imgs')->first();
            }
            return view('cart.cart',['rs'=>$rs,'site'=>$site]);
        }
        return view('cart.cart',['site'=>$site]);
    }

    /**
     *      购物车添加
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $data['userid'] = session('user_id');
        $count = DB::table('carts')->where('goodsid',$data['goodsid'])->count();
        if($count > 0){
            $num = DB::table('carts')->where('goodsid',$data['goodsid'])->value('num');
            $data['num'] += $num;
            $rs = DB::table('carts')->where('goodsid',$data['goodsid'])->update(['num'=>$data['num']]);
        }else{
            $rs = DB::table('carts')->insert($data);
        }
        if($rs){
            echo "ok";
        }else{
            echo "error";
        }
    }
    //购物车删除
    public function show($id)
    {
        $rs = DB::table('carts')->where('id',$id)->delete();
        if($rs){
            echo "ok";
        }else{
            echo "error";
        }
    }

    //  购物车数量操作
    public function num(Request $request)
    {
        $data = $request->all();
        $rs = DB::table('carts')->where('goodsid',$data['goodsid'])->update($data);
    }
}
