<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    /**
     * 显示用户列表
     */
    public function index()
    {
        
        $rs = DB::table('user')->paginate(10);
        return view('admin.user.liebiao',['rs'=>$rs]);
    }

    /**
     *  创建新用户
     */
    public function create()
    {
        
        return view('admin.user.add');
    }

    /**
     * 用户添加操作页面
     */
    public function store(Request $request)
    {
        
        $data = $request->except('_token','repwd');
        $count = DB::table('user')->where('name',$data['name'])->count();
        if($count>0){
            return back()->with(['msg'=>'oh! 添加失败! 已存在相同用户名','msg_info'=>'alert-danger']);
        }else{
            $rs = DB::table('user')->insert($data);
            if($rs){
                return redirect('/admin/user')->with(['msg'=>'ok~ 添加成功!','msg_info'=>'alert-success']);
            }else{
                return back()->with(['msg'=>'oh! 添加失败!','msg_info'=>'alert-danger']);
            }
        }
    }

    /**
     * 未激活会员
     */
    public function show($id)
    {
        if($id == 'jihuo'){
            $rs = DB::table('user')->where('ztid','0')->paginate(10);
            return view('admin.user.jihuo',['rs'=>$rs]);
        }else{
            abort(404);
        }
    }

    /**
     * 用户编辑
     */
    public function edit($id)
    {
        
        $rs = DB::table('user')->where('id',$id)->first();
        return view('admin.user.edit',['rs'=>$rs]);
    }

    /**
     * 用户编辑更新操作
     */
    public function update(Request $request, $id)
    {
        
        $data = $request->only('phone','email');
        $rs = DB::table('user')->where('id',$id)->update($data);
        if($rs){
            return redirect('/admin/user')->with(['msg'=>'ok~ 修改成功!','msg_info'=>'alert-success']);
        }else{
            return back()->with(['msg'=>'oh! 修改失败!','msg_info'=>'alert-danger']);
        }
    }

    /**
     * 用户删除操作
     */
    public function destroy($id)
    {
        
        $rs = DB::table('user')->where('id',$id)->delete();
        if($rs){
            return redirect('/admin/user')->with(['msg'=>'ok~ 删除成功!','msg_info'=>'alert-success']);
        }else{
            return back()->with(['msg'=>'oh! 删除失败!','msg_info'=>'alert-danger']);
        }
    }

    public function tx($id)
    {
        //return back()->with(['msg'=>'ok~ 已发送邮件提醒','msg_info'=>'alert-success']);
        return back()->with(['msg'=>'oh! 邮件发送失败','msg_info'=>'alert-danger']);
    }


}
