<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use Hash;

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
        if(session('user_name')){
            return redirect('/');
        }{
            return view('login');
        }
    }
    //登陆验证
    public function dologin(Request $request)
    {
        $data = $request->except('_token');
        $rs = DB::table('user')->where('name',$data['name'])->first();
        if($rs){
            $rss = Hash::check($request->pwd,$rs->pwd);
            if($rss){
                session(['user_name'=>$rs->name]);
                return redirect('/');
            }else{
                return back()->with('msg','用户名密码错误!');
            }
        }else{
            return back()->with('msg','用户名密码错误!');
        }
    }
    //注销操作
    public function logout()
    {
        session()->forget('user_name');
        return redirect('/');
    }
}
