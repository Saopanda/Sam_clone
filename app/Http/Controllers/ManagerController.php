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
        if (session('roles') == 1) {
            $data=DB::table('manager')->orderBy('id','desc')->paginate(10);
            return view('admin.manager.index',['data'=>$data,]);
        }else if(session('roles') == 2){
            $da = DB::table('manager')->where('name',session('admin_name'))->first();
            return view('admin.manager.index',['da'=>$da]);
        }
                    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session('roles') == 1){
           return view('admin.manager.create'); 
        }else{
           return back()->with(['msg'=>'您不是超级管理员或权限不足,请联系超级管理员!','msg_info'=>'alert-danger']); 
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
        $re = DB::table('manager')->where('id',$id)->first();        
        if (session('admin_name') == $re->name || session('roles') == 1) {
            $res=DB::table('manager')->where('id',$id)->first();
            return view('admin.manager.edit',['res'=>$res]);
        }else{
             return back()->with(['msg'=>'您当前账号不匹配或您不是超级管理员!请联系超级管理员!','msg_info'=>'alert-danger']);
        }
        
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
        $re = DB::table('manager')->where('id',$id)->first();
       if(session('roles') == 1 && $re->roles != 1){
            $res = DB::table('manager')->where('id',$id)->delete();
            if ($res) {
               return redirect('/admin/manager')->with(['msg'=>'ok~ 删除成功!','msg_info'=>'alert-success']);
            }else{
               return back()->with(['msg'=>'oh! 删除失败!','msg_info'=>'alert-danger']);
            }
       }else{
            return back()->with(['msg'=>'您不是超级管理员或权限不足或删除管理员!请联系超级管理员!','msg_info'=>'alert-danger']);
       }
       
    }
}
