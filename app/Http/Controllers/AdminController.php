<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use App\Customer;
use App\Bill;
use Auth;
use Hash;
use App\BillDetail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //login
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

//san pham
    public function getallproduct(Request $req) {
        // if(Auth::user()->full_name) {
            $products = Product::paginate(10);
            return view('Admin.sanpham', compact('products'));
        // } else {
        //     return view('Admin.login');
        // }
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
        return redirect('admin/sanpham')->with('thongbao', 'Thêm sản phẩm thành công');
    }

    //danh muc
    public function getalldanhmuc() {
        // if(Auth::user()->full_name) {
            $type_products = ProductType::paginate(10);
            return view('Admin.danhmuc', compact('type_products'));
        // } else {
        //     return view('Admin.login');
        // }
    }

    public function getthemdanhmuc() {
        return view('Admin.themdanhmuc');
    }

    public function postthemdanhmuc(Request $req) {
        $Type =  new ProductType;
        $Type->name = $req->tendanhmuc;
        $Type->description = $req->mieuta;
        $Type->image = $req->image;
        $Type->save();
        return redirect('admin/themdanhmuc')->with('thongbao', 'Thêm danh mục thành công');
    }

    public function getchitietdanhmuc($id) {
        $type = ProductType::where('id', $id)->first();
        return view('Admin.chitietdanhmuc', compact('type'));
    }

    public function getdeletedanhmuc($id) {
        $type = ProductType::where('id', $id)->delete();
        return redirect('admin/danhmuc')->with('thongbao', 'Xóa thành công');
    }

    public function postupdatedanhmuc(Request $req, $id) {
        $type = new ProductType;
        $type = ProductType::find($id);
        $type->name = $req->tendanhmuc;
        $type->description = $req->mieuta;
        $type->image = $req->image;
        $type->save();
        return redirect('admin/danhmuc')->with('thongbao', 'Cập nhật thành công');
    }
    
    //khach hang
    public function getallkhachhang() {
        $customers = Customer::paginate(10);
        return view('Admin.khachhang', compact('customers'));
    }

    public function getthemkhachhang() {
        return view('Admin.themkhachhang');
    }

    public function postthemkhachhang(Request $req) {
        $customer =  new Customer;
        $customer->name = $req->tenkhachhang;
        $customer->gender = $req->gt;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->note;
        $customer->save();
        return redirect('admin/themkhachhang')->with('thongbao', 'Thêm khách hàng thành công');
    }

    public function getchitietkhachhang($id) {
        $customer = Customer::where('id', $id)->first();
        return view('Admin.chitietkhachhang', compact('customer'));
    }

    public function postupdatekhachhang(Request $req, $id) {
        $customer = new Customer;
        $customer = Customer::find($id);
        $customer->name = $req->tenkhachhang;
        $customer->gender = $req->gt;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->note;
        $customer->save();
        return redirect('admin/khachhang')->with('thongbao', 'Cập nhật thành công');
    }

    //hoa don
    public function getallhoadon() {
        $bills = Bill::all();
        return view('Admin.hoadon',compact('bills'));
    }

    public function getchitietHD($id) {
        $bill_detail = BillDetail::where('id_bill', $id)->get();
        $bill = Bill::where('id', $id)->first();
        $customer = Customer::where('id',$bill->id_customer)->first();
        // $list = array();
        foreach($bill_detail as $value){
            $product = Product::where('id',$value->id_product)->first();
            dump($product->name);
        }
        // dump($product->name);
        return view('Admin.chitiethoadon', compact('bill_detail', 'bill', 'customer', 'product'));
    }
    //user
    public function getalluser() {
        return view('Admin.user');
    }
}
