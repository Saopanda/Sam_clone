<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;

class indexController extends Controller
{
	// 首页展示
    public function index()
    {
        $data=DB::table('class')->where('pid','0')->get();
        foreach ($data as $k => &$v) {
            //dd($v->pid.'_'.$v->id);
           $v->two =DB::table('class')->where('pid',$v->id)->get();

           //$v->there = DB::table('class')->where('path',$v->pid.'_'.$v->id)->get();
        foreach ($v->two as $ka => &$va) {
            $va->there =DB::table('class')->where('pid',$va->id)->get();

        }
        }
        //dd($data);
    	return view('index',['data'=>$data]);
    }
    // 列表页
    public function list()
    {
    	return view('list');
    }
    //登陆
    public function login()
    {
    	return view('login');
    }
}
