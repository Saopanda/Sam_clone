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
       // DB::table('manager')->insert($data);
       $res=DB::table('manager')->where('name',$data['name'])->first();       
       if (empty($res)){
           DB::table('manager')->insert($data);
           return back()->with('msg','添加成功!!!');
       }else{
           return back()->with('msg','添加失败!!!');
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
            return back()->with('msg','密码错误,请重新修改!!!');
        }else{
            DB::table('manager')->where('id',$id)->update($newdata);
            return back()->with('msg','恭喜您,修改成功!!!');
            // alert(1);
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
           return back()->with('msg','删除成功');
       }else{
           return back()->with('msg','删除成功');
       }
    }
}
