<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PinglunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pl = DB::table('pinglun')->paginate(10);
        return view('admin.pinglun.index',['pl'=>$pl]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pl = DB::table('pinglun')->where('shenghe',2)->paginate(10);
        return view('admin.pinglun.create',['pl'=>$pl]);
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
        
        return view('admin.pinglun.edit',['pl'=>$pl]);
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
        $shenghe['shenghe']=1;
        $res = DB::table('pinglun')->where('id',$id)->update($shenghe);
        if($res == 1){
            return redirect('/admin/pinglun')->with(['msg'=>'ok~ 审核成功!','msg_info'=>'alert-success']);
        }else{
            return back()->with(['msg'=>'oh! 审核失败!','msg_info'=>'alert-danger']);
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
        //
    }
}
