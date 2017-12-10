<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //读取分类的信息
       $data=DB::table('class')->where('pid','0')->get();
        foreach ($data as $k => &$v) {
            //dd($v->pid.'_'.$v->id);
           $v->two =DB::table('class')->where('pid',$v->id)->get();

           //$v->there = DB::table('class')->where('path',$v->pid.'_'.$v->id)->get();
        foreach ($v->two as $ka => &$va) {
            $va->there =DB::table('class')->where('pid',$va->id)->get();

        }
        }
        return view('admin.class.index',['class'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fenl=DB::table('class')->where('pid',0)->get();
       // dd($fenl);
       return view('admin.class.create',['fenl'=>$fenl]);
       // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except(['_token','jbone','jbtwo']);
        //dd($data);
         //判断是否为顶级分类
        if($data['pid'] == 1) {
            $data['path'] = '0';
        }else if($data['pid'] == 2){
            //dd(1);
            //读取父级分类的信息
            $p = DB::table('class')->where('id', $request->input('jbone'))->first();
            //dd($p);
            $data['pid'] = $p->id;
            $data['path'] = $p->path.'_'.$p->id;
            //dd($data['path']);
        }else{
             $p = DB::table('class')->where('id', $request->input('jbtwo'))->first();
            //dd($p);
            $data['pid'] = $p->id;
            $data['path'] = $p->path.'_'.$p->id;
            //dd($data['path']);
         
        }
        //将数据插入到数据库
        if(DB::table('class')->insert($data)){
            return redirect('admin/class')->with(['msg'=>'ok~添加成功!','msg_info'=>'alert-success']);
        }else{
            return back()->with(['msg'=>'ok~ 添加失败!','msg_info'=>'alert-danger']);
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
    public function edit($id)
    {
        //
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

        //获取当前的分类信息
        $cate=DB::table('class')->where('id',$id)->first();
        // 拼接path
        $path = $cate->path .'_'.$cate->id;// 0_1_3
        //删除子分类
        $res = DB::table('class')->where('path','like',$path.'%')->delete();
        //删除自己
        if(DB::table('class')->where('id',$id)->delete()) {
            return back()->with(['msg'=>'ok~删除成功!','msg_info'=>'alert-success']);
        }else{
            return back()->with(['msg'=>'ok~ 删除失败!','msg_info'=>'alert-danger']);
        }

    }
    public function getwomenu(Request $request){
        $pid = $request->oneid;
        //echo $pid;
        $twoid = DB::table('class')->where('pid',$pid)->get();
        return $twoid;

    }
}
