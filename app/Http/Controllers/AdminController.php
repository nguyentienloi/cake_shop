<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getlogin() {
        return view('Admin.login');
    }

    public function postlogin() {
        return view('Admin.index');
        // return redirect()->view('Admin.index');
    }

    public function getallproduct() {
        return view('Admin.sanpham');
    }
}
