<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //后台登陆
    public function login()
    {
        return view('admin.login');
    }

    // 后台首页
    public function index()
    {
        return view('admin.index');
    }
}
