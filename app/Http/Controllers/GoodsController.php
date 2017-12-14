<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GoodsController extends Controller
{
    /**
     *  商品列表
     */
    public function index(Request $request)
    {
        $goods = DB::table('goods')->paginate(10);
        return view('admin.goods.index',['goods'=>$goods]);
    }

    /**
     *  商品添加
     */
    public function create()
    {
        $data=DB::table('class')->where('pid','0')->get(); 

        return view('admin.goods.create',['fenl'=>$data]);
    }

    /**
     * 商品添加操作
     */
    public function store(Request $request)
    {   
        $data = $request->only(['title','price','content','num','ztid','flid','huodong']);
        // dd($data);
        if ($data['price'] > 0 && $data['num'] >= 0) {
            //补时间
            $data['addtime'] = date('Y-m-d H:i:s');
            //将数据插入到商品表中
            $res = DB::table('goods')->insertGetId($data);
            //如果插入成功
            if($res > 0) {
                //处理图片
                if($request->hasFile('imgsxq')){
                    $imagesxq = [];
                    //遍历文件上传的数组
                    foreach($request->file('imgsxq') as $k=>$v) {
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
                        $tmp['imgname'] = $name;
                        $tmp['goodsid'] = $res;
                        $tmp['img_lx'] = 1;
                        $tmp['imgs'] = trim($dir.'/'.$name,'.');
                        $imagesxq[] = $tmp;
                    }
                    //将图片信息插入到商品图片表中
                    DB::table('goods_pic')->insert($imagesxq);
                }

                if($request->hasFile('imgsxt')){
                    $imagesxt = [];
                    //遍历文件上传的数组
                    foreach($request->file('imgsxt') as $k=>$v) {
                        $xt = [];
                        //获取文件的后缀名
                        $suffix = $v->extension();
                        //创建一个新的随机名称
                        $name = uniqid('img_').'.'.$suffix;
                        //文件夹路径
                        $dir = './uploads/'.date('Y-m-d');
                        //移动文件
                        $v->move($dir, $name);
                        //获取文件的路径
                        $xt['imgname'] = $name;
                        $xt['goodsid'] = $res;
                        $xt['img_lx'] = 0;
                        $xt['imgs'] = trim($dir.'/'.$name,'.');
                        $imagesxt[] = $xt;
                    }
                    //将图片信息插入到商品图片表中
                    DB::table('goods_pic')->insert($imagesxt);
                }


                if($request->hasFile('imgsdt')){
                    $imagesxt = [];
                    //遍历文件上传的数组
                    foreach($request->file('imgsdt') as $k=>$v) {
                        $dt = [];
                        //获取文件的后缀名
                        $suffix = $v->extension();
                        //创建一个新的随机名称
                        $name = uniqid('img_').'.'.$suffix;
                        //文件夹路径
                        $dir = './uploads/'.date('Y-m-d');
                        //移动文件
                        $v->move($dir, $name);
                        //获取文件的路径
                        $dt['imgname'] = $name;
                        $dt['goodsid'] = $res;
                        $dt['img_lx'] = 2;
                        $dt['imgs'] = trim($dir.'/'.$name,'.');
                        $imagesdt[] = $dt;
                    }
                    //将图片信息插入到商品图片表中
                    DB::table('goods_pic')->insert($imagesdt);
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
     * 商品前台展示
     */
    public function show($id)
    {
        $rs = DB::table('goods')->where(['id'=>$id,'ztid'=>1])->select('id','title','num','price','content','flid')->first();
        if($rs){
            $rs->goods_zhong = DB::table('goods_pic')->where(['goodsid'=>$rs->id,'img_lx'=>2])->select('imgs','img_lx')->get();
            $rs->goods_xq = DB::table('goods_pic')->where(['goodsid'=>$rs->id,'img_lx'=>1])->select('imgs','img_lx')->get();
            // 查询path
            $path = DB::table('class')->where('id',$rs->flid)->value('path');
            $path = str_replace('_',',',$path);
            //根据 path 查找父级分类 
            $tb = DB::select('select id,flname from class where id in('.$path.')');
            return view('goods',['rs'=>$rs,'tb'=>$tb]);

        }else{
            abort(404);
        }
        
    }

    /**
     * 商品修改
     */
    public function edit($id)
    {
        $goods = DB::table('goods')->where('id',$id)->first();
        $goodspic = DB::table('goods_pic')->where('goodsid',$id)->get();
        return view('admin.goods.edit',['goods'=>$goods,'goodspic'=>$goodspic]);
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
        $data = $request->only(['title','price','content','num','ztid','flid','huodong']);
        if ($data['price'] > 0 && $data['num'] >= 0 || $request->hasFile('imgsxq') || $request->hasFile('imgsxt') || $request->hasFile('imgsdt')){
            //将数据插入到商品表中
            $res = DB::table('goods')->where('id',$id)->update($data);            
            $pic = DB::table('goods_pic')->where('goodsid',$id)->get();
            // 0  表示小图   1 表示  详情图  2 表示  大图            
                //处理图片
                if($request->hasFile('imgsxq')){
                    $imagesxq = [];
                    //遍历文件上传的数组
                    foreach($request->file('imgsxq') as $k=>$v) {
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
                        $tmp['imgname'] = $name;
                        $tmp['goodsid'] = $id;
                        $tmp['img_lx'] = 1;
                        $tmp['imgs'] = trim($dir.'/'.$name,'.');
                        $imagesxq[] = $tmp;
                    }

                    //将图片信息插入到商品图片表中
                    DB::table('goods_pic')->insert($imagesxq);
                }

                if($request->hasFile('imgsxt')){
                    $imagesxt = [];
                    //遍历文件上传的数组
                    foreach($request->file('imgsxt') as $k=>$v) {
                        $xt = [];
                        //获取文件的后缀名
                        $suffix = $v->extension();
                        //创建一个新的随机名称
                        $name = uniqid('img_').'.'.$suffix;
                        //文件夹路径
                        $dir = './uploads/'.date('Y-m-d');
                        //移动文件
                        $v->move($dir, $name);
                        //获取文件的路径
                        $xt['imgname'] = $name;
                        $xt['goodsid'] = $id;
                        $xt['img_lx'] = 0;
                        $xt['imgs'] = trim($dir.'/'.$name,'.');
                        $imagesxt[] = $xt;
                    }
                    //将图片信息插入到商品图片表中
                    DB::table('goods_pic')->insert($imagesxt);
                }


                if($request->hasFile('imgsdt')){
                    $imagesxt = [];
                    //遍历文件上传的数组
                    foreach($request->file('imgsdt') as $k=>$v) {
                        $dt = [];
                        //获取文件的后缀名
                        $suffix = $v->extension();
                        //创建一个新的随机名称
                        $name = uniqid('img_').'.'.$suffix;
                        //文件夹路径
                        $dir = './uploads/'.date('Y-m-d');
                        //移动文件
                        $v->move($dir, $name);
                        //获取文件的路径
                        $dt['imgname'] = $name;
                        $dt['goodsid'] = $id;
                        $dt['img_lx'] = 2;
                        $dt['imgs'] = trim($dir.'/'.$name,'.');
                        $imagesdt[] = $dt;
                    }
                    //将图片信息插入到商品图片表中
                    DB::table('goods_pic')->insert($imagesdt);
                }
            
            return redirect('/admin/goods')->with(['msg'=>'ok~ 修改成功!','msg_info'=>'alert-success']);
            
        }else{
            return redirect('/admin/goods/{{$id}}')->with(['msg'=>'ok~ 修改失败!','msg_info'=>'alert-success']);
        }
        
        
    }

    /**
     * 商品删除
     */
    public function destroy($id)
    {        
        $goods = DB::table('goods')->where('id',$id)->delete();
        $goods_pic = DB::table('goods_pic')->where('goodsid',$id);
        if ($goods && $goods_pic) {
            $pic = DB::table('goods_pic')->where('goodsid',$id)->get();
            // dd($pic);
            foreach ($pic as $key => $val) {
                   $url = $val->imgs;
                   DB::table('goods_pic')->where('id',  $val->id)->delete();
                   unlink('.'.$url);
                }
           return redirect('/admin/goods')->with(['msg'=>'ok~ 删除成功!','msg_info'=>'alert-success']);
        }else{
           return back()->with(['msg'=>'oh! 删除失败!','msg_info'=>'alert-danger']);
        }
    }

    public function getwo(Request $request){
        
        $pid = $request->oneid;
        // echo $pid;
        $twoid = DB::table('class')->where('pid',$pid)->get();
        return $twoid;

    }

    public function gettwo(Request $request){
        
        $tid = $request->tid;
        // echo $tid;
        $thereid = DB::table('class')->where('pid',$tid)->get();
        return $thereid;

    }
}
