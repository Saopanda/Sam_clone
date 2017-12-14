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
        $site = DB::table('samsite')->paginate(10);
        return view('admin.samsite.index',['site'=>$site]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.samsite.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except(['_token']);
        $res = DB::table('samsite')->insert($data);
        if($res){
           return redirect('/admin/samsite')->with(['msg'=>'ok~ 添加成功!','msg_info'=>'alert-success']);
        }else{
           return back()->with(['msg'=>'oh! 添加失败!','msg_info'=>'alert-danger']);
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
        if ($id == 1) {
            return back()->with(['msg'=>'oh! 删除失败!','msg_info'=>'alert-danger']);
        }else{
            $res = DB::table('samsite')->where('id',$id)->delete();
            if ($res) {
                return redirect('/admin/samsite')->with(['msg'=>'ok~ 删除成功!','msg_info'=>'alert-success']);
            }else{
                return back()->with(['msg'=>'oh! 删除失败!','msg_info'=>'alert-danger']);
            }
        }
      
    }
}
