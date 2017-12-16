<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MenurolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('roles') == 1) {
            $data = DB::table('transfer')->orderby('adminid','asc')->paginate(20);
            return view('admin.menu.index',['data'=>$data]);
        }else{
            return redirect('/admin')->with(['msg'=>'您不是超级管理员或权限不足,请联系超级管理员','msg_info'=>'alert-danger']);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session('roles') == 1) {
            return view('admin.menu.create');
        }else{
            return redirect('/admin')->with(['msg'=>'您不是超级管理员或权限不足,请联系超级管理员','msg_info'=>'alert-danger']);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $data = $request->only(['adminid']);
        $menu = $request->only(['menuid']);
        foreach ($menu['menuid'] as $key => $val) {
            $res = DB::table('transfer')->insert(['adminid'=>$data['adminid'],'menuid'=>$val]);
            if (!$res) {
                return redirect('/admin/menuroles/create')->with(['msg'=>'oh! 添加失败!','msg_info'=>'alert-danger']);
            }
        }
        return redirect('/admin/menuroles/create')->with(['msg'=>'oh! 添加成功!','msg_info'=>'alert-success']);
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
        $res = DB::table('transfer')->where('id',$id)->delete();
        if ($res > 0) {
            return redirect('/admin/menuroles')->with(['msg'=>'oh! 删除成功!','msg_info'=>'alert-success']);
        }else{
            return back()->with(['msg'=>'oh! 删除失败!','msg_info'=>'alert-danger']);
        }
    }
}
