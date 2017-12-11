<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;

class indexController extends Controller
{
	// 首页展示
    public function index()
    {  // 分类开始
        $data=DB::table('class')->where('pid','0')->get();
        foreach ($data as $k => &$v) {
           $v->two =DB::table('class')->where('pid',$v->id)->get();
            foreach ($v->two as $ka => &$va) {
                $va->there =DB::table('class')->where('pid',$va->id)->get();

            }
        }
        // 分类结束
    	return view('index',['data'=>$data]);
    }
    // 列表页
    public function list()
    {   // 分类开始
        $data=DB::table('class')->where('pid','0')->get();
        foreach ($data as $k => &$v) {
           $v->two =DB::table('class')->where('pid',$v->id)->get();
            foreach ($v->two as $ka => &$va) {
                $va->there =DB::table('class')->where('pid',$va->id)->get();
            }
        }
         // 分类结束
    	return view('list',['data'=>$data]);
    }
    //登陆
    public function login()
    {
       
    }
   
}
