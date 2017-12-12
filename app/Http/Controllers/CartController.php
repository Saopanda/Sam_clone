<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //购物车未登录 首页
        if(session('user_name')){
            return redirect('/home/cart/my');
        }else{
            return view('cart.cart');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //购物车添加
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //购物车添加操作
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //个人购物车 显示商品
        $rs = DB::table('carts')->where('username',session('user_name'))->select('goodsid','num')->get();
        foreach($rs as $k=>$v){
            $v->goods = DB::table('goods')->where('id',$v->goodsid)->select('title','price','content')->first();
            $v->goods_pic = DB::table('goods_pic')->where(['goodsid'=>$v->goodsid,'img_lx'=>2])->select('imgs')->first();
        }
        return view('cart.cart',['rs'=>$rs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //购物车编辑
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //购物车编辑
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //购物车商品删除
    }
}
