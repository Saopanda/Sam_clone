<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (session('roles') == 1 || in_array(7, session('menuid'))) {
            $data = DB::table('order')->get();
            foreach ($data as $key => &$v) {
               $v->username = DB::table('user')->where('id',$v->userid)->value('name');
            }
            // 站点设置
            $site = DB::table('samsite')->where('weizhi','index')->first();
            // 结束
            return view('admin.order.index',['data'=>$data,'site'=>$site]);
        }else{
            return redirect('/admin')->with(['msg'=>'您不是超级管理员或权限不足,请联系超级管理员','msg_info'=>'alert-danger']);
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->only('kuaidi','kuaidihao','id');
        $arr['kuaidi']=$request->kuaidi;
        $arr['kuaidihao']=$request->kuaidihao;

        $info=DB::table('order')->where('id',$request->id)->update($arr);
        //dd($info);
        $arres['dd_status']=2;
        if($info) {
            DB::table('order')->where('id',$request->id)->update($arres);
            return redirect('/admin/order')->with(['msg'=>'ok~ 等待处理!','msg_info'=>'alert-success']);
        }else{
            return back()->with(['msg'=>'发货失败!','msg_info'=>'alert-danger']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=DB::table('order_goods')->where('order',$id)->get();
        $order=DB::table('order')->where('id',$id)->first();
        $addressid=DB::table('order')->where('id',$id)->value('addressid');
        $dizhi = DB::table('address')->where('id',$addressid)->first();
        $dizhi->pro= DB::table('dt_area')->where('id',$dizhi->pro)->value('area_name');
        $dizhi->city = DB::table('dt_area')->where('id',$dizhi->city)->value('area_name');
        $dizhi->county = DB::table('dt_area')->where('id',$dizhi->county)->value('area_name');
        foreach ($data as $key => &$v) {
           $v->goodsname = DB::table('goods')->where('id',$v->goodsid)->value('title');
           $v->xiaoji = $v->num * $v->price;
        } 
        return view('admin.order.show',['goodsinfo'=>$data,'dizhi'=>$dizhi,'order'=>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::table('order_goods')->where('order',$id)->get();
        $order=DB::table('order')->where('id',$id)->first();
        $addressid=DB::table('order')->where('id',$id)->value('addressid');
        $dizhi = DB::table('address')->where('id',$addressid)->first();
        $dizhi->pro= DB::table('dt_area')->where('id',$dizhi->pro)->value('area_name');
        $dizhi->city = DB::table('dt_area')->where('id',$dizhi->city)->value('area_name');
        $dizhi->county = DB::table('dt_area')->where('id',$dizhi->county)->value('area_name');
        foreach ($data as $key => &$v) {
           $v->goodsname = DB::table('goods')->where('id',$v->goodsid)->value('title');
           $v->xiaoji = $v->num * $v->price;
        } 
        //dd($dizhi);
        //dd($order); 
        return view('admin.order.edit',['goodsinfo'=>$data,'dizhi'=>$dizhi,'order'=>$order]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(DB::table('order')->where('id', $id)->delete()) {
            return back()->with(['msg'=>'ok~ 删除成功!','msg_info'=>'alert-success']);
        }else{
            return back()->with(['msg'=>'ok~ 删除失败!','msg_info'=>'alert-danger']);
        }
    }
   
}
