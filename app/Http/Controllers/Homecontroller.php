<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Homecontroller extends Controller
{
    //个人中心
    public function index(){    	
        $sion = session('user_name');
        $sioninfo=DB::table('user')->where('name',$sion)->select('id','name','email','phone','ztid')->first();
        $sioninfo->phone = substr_replace($sioninfo->phone, '****', 3,4);
        $info=DB::table('userinfo')->where('id',$sioninfo->id)->first();
        //dd($sioninfo);
         // 分类结束
        return view('home.index',['sioninfo'=>$sioninfo,'info'=>$info]);
    }

    //编辑个人中心数据
    public function bianji(Request $request){
        $data=$request->only('phone','email','id');
        $datas=[];
        if($request->hasFile('touimg')) {
            //获取文件的后缀名
            $suffix = $request->file('touimg')->extension();
            //创建一个新的随机名称
            $name = uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir = './uploads/'.date('Y-m-d');
            //移动文件
            $request->file('touimg')->move($dir, $name);
            //获取文件的路径
            $datas['touimg'] = trim($dir.'/'.$name,'.');
        }
        $datas['shengri']=$request->input('shengri');

      $xg=DB::table('user')->where('id',$request->input('id'))->update($data);
      $touimg=DB::table('userinfo')->where('id',$request->input('id'))->update($datas);
      return redirect('/home');
    }

     //订单
    public function order(){
        return view('home.order');
    }
}
