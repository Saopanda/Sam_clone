<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = session('user_name');
        $n=DB::table('user')->where('name',$name)->value('id');
        $addresses = DB::table('address')->where('userid',$n)->get();
        $num=count($addresses);
            //dd($num);
        foreach ($addresses as $key => &$value) {
            $value->pname = DB::table('dt_area')->where('id',$value->pro)->value('area_name');
            $value->cname = DB::table('dt_area')->where('id',$value->city)->value('area_name');
            $value->xname = DB::table('dt_area')->where('id',$value->county)->value('area_name');
            }          
        return view('address.index', compact('addresses','num'));
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
        $data=$request->except('_token');

         $name = session('user_name');
         $n=DB::table('user')->where('name',$name)->value('id');
         $data['userid']=$n;
         if(DB::table('address')->insert($data)){
             return redirect('home/address');
         }else{
            return '添加失败';
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
        echo "hehe";
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
        if(DB::table('address')->where('id', $id)->delete()) {
            return back();
        }else{
            return back();
        }
    }
    public function getarea(Request $request){
       //dd(123);
        $pid = $request->input('pid');
       $areas = DB::table('dt_area')->where('area_parent_id',$pid)->get();
       //dd($areas);

         return $areas;
    }

}
