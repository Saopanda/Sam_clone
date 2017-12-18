<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use Hash;
class signupController extends Controller
{
    
    //注册
    public function signup()
    {
		return view('signup');
	}
	//注册操作
	public function store(Request $request)
	{
		
		//二次验证手机
		$phone = 'code_'.$request->input('phone');
		$code = $request->input('yzm');
		//验证
		if (session()->pull($phone,'default') == $code){
			$data = $request->except('_token','repwd','yzm');
			$data['sta']=str_random(18);
			$data['pwd']=Hash::make($data['pwd']);
			$rs = DB::table('user')->insertGetid($data);
			$info['shengri']='17-12-16';
			$info['touimg']='https://lorempixel.com/40/40/?62640';
			DB::table('userinfo')->where('id',$rs)->insert($info);
			if($rs){
				return redirect('/signup/send/'.$rs);
			}else{
				abort(500);
			}
		}else{
			echo "非法操作";
		}
	}
	//验证是否重名
	public function name(Request $request)
	{

		$name = $request->input('name');
		$rs = DB::table('user')->where('name',$name)->count();
		if($rs >0){
			echo "error";
		}else{
			echo "ok";
		}
	}
	//短信验证码创建
	public function sms_create(Request $request)
	{
		//拼接字符串
		$phone = 'code_'.$request->input('phone');
		$$phone = rand(10000,99999);
		###########################
		#	将验证码通过接口发送    #
		###########################
		session([$phone=>$$phone]);
		// 临时测试,直接输出验证码
		echo session($phone);
	}
	//短信验证码验证
	public function sms(Request $request)
	{
		//拼接
		$phone = 'code_'.$request->input('phone');
		$code = $request->input('yzm');
		//验证
		if (session($phone) == $code) {
			echo "ok";
		}else{
			echo "error";
		}
	}
    //注册邮箱
    public function send($id)
    {
        $rs = DB::table('user')->where('id',$id)->select('sta','name','email','phone')->first();
        Mail::send('email.signup', ['rs'=>$rs], function ($message) use ($rs) {
            //标题
            $message->subject('欢迎注册Sam会员商城');
            //接收者
            $message->to($rs->email);
        });
        return view('email.send');
    }
    //邮箱验证
    public function yz($id)
    {
    	$ids = session('user_id');
        $rs = DB::table('user')->where('id',$ids)->value('ztid');
        if($rs == 0){
	    	$rs = DB::table('user')->where('sta',$id)->update(['ztid'=>1]);
			return view('email.yz');
		}else{
			return redirect('/login');
		}
    }
}
