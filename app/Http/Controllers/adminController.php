<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
class adminController extends Controller
{
    //后台登陆
    public function login()
    {
        if(session('admin_name')){
            return redirect('/admin');
        }else{
            return view('admin.login');
        }
    }
    //后台登陆验证
    public function dologin(Request $request)
    {        
        $data = $request->except('_token');
        $rs = DB::table('manager')->where('name',$data['name'])->first();              
        if($rs){
            $rss = Hash::check($request->pwd,$rs->pwd);
            if($rss){
                session(['admin_name'=>$rs->name]);
                // 管理员权限
                session(['roles'=>$rs->roles]);
                // 栏目权限                
                $menu = DB::table('transfer')->where('adminid',$rs->id)->get();
                if (count($menu) > 0) {
                    foreach ($menu as $key => $val) {
                        $menuid[] = $val->menuid;
                    } 
                    session(['menuid'=>$menuid]);
                }
                // 结束
                return redirect('/admin')->with(['msg'=>'欢迎回来~ 管理员','msg_info'=>'alert-success']);
            }else{
                return back()->with(['msg'=>'登录失败','msg_info'=>'alert-danger']);
            }
        }else{
            return back()->with(['msg'=>'登录失败','msg_info'=>'alert-danger']);
        }
    }
    // 后台首页
    public function index()
    {   
        return view('admin.index',[session('roles')]);
    }
    //注销登陆
    public function logout()
    {
        session()->forget('admin_name','roles','menuid');
        return redirect('/admin/login')->with(['msg'=>'退出成功!','msg_info'=>'alert-success']);
    }
}
