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
            $data = DB::table('transfer')->orderby('adminid','asc')->select('adminid','menuid')->paginate(20);
            dd($data);
            return view('admin.menu.index',['data'=>$data]);
        }else{
            return redirect('/admin')->with(['msg'=>'您不是超级管理员,权限不足,请联系超级管理员','msg_info'=>'alert-danger']);
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
            return redirect('/admin')->with(['msg'=>'您不是超级管理员,权限不足,请联系超级管理员','msg_info'=>'alert-danger']);
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
        return redirect('/admin/menuroles/create')->with(['msg'=>'oh! 添加成功!','msg_info'=>'alert-danger']);
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
        return view('admin.menu.edit');
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
        //
    }
}
