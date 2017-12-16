<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class samcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(session('menuid'));
        // dd(in_array(1, session('menuid')));
        if (session('roles') == 1 || in_array(1, session('menuid'))) {
            $site = DB::table('samsite')->paginate(10);
            return view('admin.samsite.index',['site'=>$site]);
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $res = DB::table('samsite')->where('id',$id)->first();
        return view('admin.samsite.edit',['res'=>$res]);
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
        $data=$request->except(['_token','_method']);
        $res=DB::table('samsite')->where('id',$id)->update($data); 
        if($res == 1){
           return redirect('/admin/samsite')->with(['msg'=>'ok~ 设置成功!','msg_info'=>'alert-success']);
        }else{
           return back()->with(['msg'=>'oh! 设置失败!','msg_info'=>'alert-danger']);
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
       
    }
}
