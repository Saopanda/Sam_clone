<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $goods = DB::table('goods')->paginate(10);
        return view('admin.goods.index',['goods'=>$goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.goods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['title','price','content','num','ztid']);
        if ($data['price'] > 0 && $data['num'] >= 0) {
            //补时间
            $data['addtime'] = date('Y-m-d H:i:s');
            //将数据插入到商品表中
            $res = DB::table('goods')->insertGetId($data);
            //如果插入成功
            if($res > 0) {
                //处理图片
                if($request->hasFile('imgs')){
                    $images = [];
                    //遍历文件上传的数组
                    foreach($request->file('imgs') as $k=>$v) {
                        $tmp = [];
                        //获取文件的后缀名
                        $suffix = $v->extension();
                        //创建一个新的随机名称
                        $name = uniqid('img_').'.'.$suffix;
                        //文件夹路径
                        $dir = './uploads/'.date('Y-m-d');
                        //移动文件
                        $v->move($dir, $name);
                        //获取文件的路径
                        $tmp['goodsid'] = $res;
                        $tmp['imgs'] = trim($dir.'/'.$name,'.');
                        $images[] = $tmp;
                    }
                    //将图片信息插入到商品图片表中
                    DB::table('goods_pic')->insert($images);
                }
                    return redirect('/admin/goods')->with(['msg'=>'ok~ 添加成功!','msg_info'=>'alert-success']);
            }else{
                return redirect('/admin/goods/create')->with(['msg'=>'oh! 添加失败!','msg_info'=>'alert-danger']);
            }
           }else{
                return redirect('/admin/goods/create')->with(['msg'=>'oh! 添加失败!','msg_info'=>'alert-danger']);
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
        return view('goods');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "修改";
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
        echo "修改页面";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goods = DB::table('goods')->where('id',$id)->delete();
        $goods_pic = DB::table('goods_pic')->where('goodsid',$id);
        if ($goods && $goods_pic) {
           return redirect('/admin/goods')->with(['msg'=>'ok~ 删除成功!','msg_info'=>'alert-success']);
        }else{
           return back()->with(['msg'=>'oh! 删除失败!','msg_info'=>'alert-danger']);
        }
    }
}
