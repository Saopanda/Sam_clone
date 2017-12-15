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
        $data = DB::table('order')->get();
        foreach ($data as $key => &$v) {
           $v->username = DB::table('user')->where('id',$v->userid)->value('name');
           $v->goodsname = DB::table('order_goods')->where('order',$v->id)->get();
           $v->address = DB::table('address')->where('id',$v->addressid)->first();
           //收货人名字,省 市 区 详细地址
           $v->name = DB::table('address')->where('id',$v->addressid)->value('name');
           $v->pro = DB::table('dt_area')->where('id',$v->address->pro)->value('area_name');
           $v->city = DB::table('dt_area')->where('id',$v->address->city)->value('area_name');
           $v->county = DB::table('dt_area')->where('id',$v->address->county)->value('area_name');
           $v->content = DB::table('address')->where('id',$v->addressid)->value('content');
        }
        // 站点设置
        $site = DB::table('samsite')->where('weizhi','index')->first();
        // 结束
        return view('admin.order.index',['data'=>$data,'site'=>$site]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
