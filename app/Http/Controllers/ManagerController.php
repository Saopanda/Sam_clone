<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data=DB::table('manager')->orderBy('id','desc')->paginate(10);
        return view('admin.manager.index',['data'=>$data,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
       $data=$request->except(['_token','repwd']);
       $data['pwd']=Hash::make($data['pwd']);
       $res=DB::table('manager')->where('name',$data['name'])->first();       
       if (empty($res)){
           DB::table('manager')->insert($data);
           return redirect('/admin/manager')->with(['msg'=>'ok~ 添加成功!','msg_info'=>'alert-success']);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $res=DB::table('manager')->where('id',$id)->first();
        return view('admin.manager.edit',['res'=>$res]);
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
        $res=DB::table('manager')->where('id',$id)->first();
        $yz=Hash::check($data['oldpwd'],$res->pwd);
        // dd($yz);    
        $newdata=$request->except(['_token','_method','oldpwd']); 
        $newdata['pwd']=Hash::make($data['pwd']);        
        if (!$yz) {

            return back()->with(['msg'=>'oh! 修改失败!','msg_info'=>'alert-danger']);
        }else{
            DB::table('manager')->where('id',$id)->update($newdata);
            return redirect('/admin/manager')->with(['msg'=>'ok~ 修改成功!','msg_info'=>'alert-success']);     
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
       $res = DB::table('manager')->where('id',$id)->delete();
       if ($res) {
           return redirect('/admin/manager')->with(['msg'=>'ok~ 删除成功!','msg_info'=>'alert-success']);
       }else{
           return back()->with(['msg'=>'oh! 删除失败!','msg_info'=>'alert-danger']);
       }
    }
}
