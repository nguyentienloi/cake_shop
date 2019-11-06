<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use App\Customer;
use App\Bill;
use Auth;
use Hash;

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

    public function postlogin(Request $req) {
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return view('Admin.index');
        } else {
            return print_r('dang nhap that bai');
        }
    }

    public function getallproduct(Request $req) {
        if(Auth::user()->full_name) {
            $products = Product::paginate(10);
            return view('Admin.sanpham', compact('products'));
        } else {
            return view('Admin.login');
        }
    }

    public function getoneproduct($id) {
        $product = Product::where('id', $id)->first();
        $type = ProductType::where('id', $product->id_type)->first();
        $types = ProductType::all();
        return view('Admin.chitietsanpham', compact('product','type', 'types'));
    }

    public function postupdateproduct(Request $req, $id) {
        if($req->loaidanhmuc == "Bánh kem") {
            $loaisanpham = 4;
        } else if($req->loaidanhmuc == "Bánh mặn") {
            $loaisanpham = 1;
        } else if($req->loaidanhmuc == "Bánh ngọt") {
            $loaisanpham = 2;
        } else if($req->loaidanhmuc == "Bánh trái cây") {
            $loaisanpham = 3;
        } else if($req->loaidanhmuc == "Bánh crepe") {
            $loaisanpham = 5;
        } else if($req->loaidanhmuc == "Bánh Pizza") {
            $loaisanpham = 6;
        } else if($req->loaidanhmuc == "Bánh su kem") {
            $loaisanpham = 7;
        }

        $product = new Product;
        $product = Product::find($id);
        $product->name = $req->tensanpham;
        $product->id_type = $loaisanpham;
        $product->description = $req->mieuta;
        $product->unit_price = $req->gia;
        $product->image = $req->image;
        $product->save();
        return redirect('admin/sanpham')->with('thongbao', 'Cập nhật thành công');
    }

    public function deleteProduct($id) {
        $product = Product::where('id', $id)->delete();
        return redirect('admin/sanpham')->with('thongbao', 'Xóa thành công');
    }

    public function getAddProduct(Request $req) {
        return view('Admin.addsanpham');
    }

    public function postAddProduct(Request $req) {
        $product =  new Product;
        $product->name = $req->tensanpham;
        $product->id_type = $req->loaisanpham;
        $product->description = $req->mieuta;
        $product->unit_price = $req->gia;
        $product->image = $req->image;
        $product->save();
        return redirect()->back()->with('thongbao', 'them san pham thành công');
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
