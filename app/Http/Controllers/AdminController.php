<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use App\Customer;
use App\Bill;

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
        $products = Product::all();
        return view('Admin.sanpham', compact('products'));
    }

    public function getoneproduct($id) {
        $product = Product::where('id', $id)->first();
        $type = ProductType::where('id', $product->id_type)->first();
        return view('Admin.chitietsanpham', compact('product','type'));
    }

    public function getalldanhmuc() {
        $type_products = ProductType::all();
        return view('Admin.danhmuc', compact('type_products'));
    }

    public function getallkhachhang() {
        $customers = Customer::all();
        return view('Admin.khachhang', compact('customers'));
    }

    public function getallhoadon() {
        $bills = Bill::all();
        $customers = Customer::get();
        return view('Admin.hoadon',compact('bills','customers'));
    }

    public function getalluser() {
        return view('Admin.danhmuc');
    }
}
