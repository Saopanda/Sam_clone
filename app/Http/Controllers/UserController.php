<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //用户管理首页,显示用户列表
        $rs = DB::table('user')->paginate(12);
        return view('admin.user.liebiao',['rs'=>$rs]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //用户添加页面
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //用户添加操作页面
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //...
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //用户编辑
        $rs = DB::table('user')->where('id',$id)->first();
        return view('admin.user.edit',['rs'=>$rs]);
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
        //用户编辑更新操作
        $data = $request->only('phone','email');
        $rs = DB::table('user')->where('id',$id)->update($data);
        if($rs){
            return redirect('/admin/user')->with(['msg'=>'ok~ 修改成功!','msg_info'=>'alert-success']);
        }else{
            return back()->with(['msg'=>'oh! 修改失败!','msg_info'=>'alert-danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //用户删除操作
        $rs = DB::table('user')->where('id',$id)->delete();
        if($rs){
            return redirect('/admin/user')->with(['msg'=>'ok~ 删除成功!','msg_info'=>'alert-success']);
        }else{
            return back()->with(['msg'=>'oh! 删除失败!','msg_info'=>'alert-danger']);
        }
    }


    public function jihuo()
    {
        // 待激活会员
    }
}
