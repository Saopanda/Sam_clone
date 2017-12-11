<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Homecontroller extends Controller
{
    //个人中心
    public function index(){
    	$data=DB::table('class')->where('pid','0')->get();
        foreach ($data as $k => &$v) {
           $v->two =DB::table('class')->where('pid',$v->id)->get();
            foreach ($v->two as $ka => &$va) {
                $va->there =DB::table('class')->where('pid',$va->id)->get();
            }
        }
         // 分类结束
        return view('home.index',['data'=>$data]);
    }

     //订单
    public function order(){
        // 分类开始
        $data=DB::table('class')->where('pid','0')->get();
        foreach ($data as $k => &$v) {
           $v->two =DB::table('class')->where('pid',$v->id)->get();
            foreach ($v->two as $ka => &$va) {
                $va->there =DB::table('class')->where('pid',$va->id)->get();
            }
        }
         // 分类结束
        return view('home.order',['data'=>$data]);
    }
}
