<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data=DB::table('ad')->paginate(10);
        // dd($data);
        return view('admin.ad.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ad.create');
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
        //dd($xinxi);
        //针对图片处理
        if($request->hasFile('img_url')) {
            //获取文件的后缀名
            $suffix = $request->file('img_url')->extension();
            //创建一个新的随机名称
            $name = uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir = './uploads/'.date('Y-m-d');
            //移动文件
            $request->file('img_url')->move($dir, $name);
            //获取文件的路径
            $data['img_url'] = trim($dir.'/'.$name,'.');
        }
         //将数据插入到数据库中
        if(DB::table('ad')->insert($data)) {
            return redirect('/admin/ad')->with('msg','添加成功');
        }else{
            return back()->with('msg','添加失败!!');
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
        $xginfo=DB::table('ad')->where('id',$id)->first();
        return view('admin.ad.edit',['xginfo'=>$xginfo]);
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

        //dd($data);
        //针对图片处理
        if($request->hasFile('img_url')) {
            //获取文件的后缀名
            $suffix = $request->file('img_url')->extension();
            //创建一个新的随机名称
            $name = uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir = './uploads/'.date('Y-m-d');
            //移动文件
            $request->file('img_url')->move($dir, $name);
            //获取文件的路径
            $data['img_url'] = trim($dir.'/'.$name,'.');
        }
         //将数据插入到数据库中
        if(DB::table('ad')->where('id',$id)->update($data)) {
            return redirect('/admin/ad')->with('msg','修改成功');
        }else{
            return back()->with('msg','修改失败!!');
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
        if(DB::table('ad')->where('id', $id)->delete()) {
            return back()->with('msg','删除成功');
        }else{
            return back()->with('msg','删除失败!!');
        }
    }
}
