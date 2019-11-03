<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex() {
        $slide = Slide::all();
       // $new_product = Product::where('new', 1)->get(); truyền ra hết 17 sản phẩm có new = 1
        $new_product = Product::where('new', 1)->paginate(4); // chỉ lấy ra 4 phần tử
        $sale_product = Product::where('promotion_price', '<>', 0)->paginate(8);
        return view('Page.trangchu', compact('slide', 'new_product', 'sale_product'));
    }

    public function getLoaiSP($type) {
        $sp_theoloai = Product::where('id_type', $type)->get();
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);
        $loai = ProductType::all();
        $loaisanpham = ProductType::where('id', $type)->first();
        return view('Page.loai_sanpham', compact('sp_theoloai', 'sp_khac','loai', 'loaisanpham'));
    }

    public function getChitietSP(Request $req) {
        $sanpham = Product::where('id', $req->id)->first();
        $sp_khac = Product::where('id_type', '<>', $sanpham->id_type)->paginate(3);
        return view('Page.chitiet_sanpham', compact('sanpham','sp_khac'));
    }

    public function getContact() {
        return view('Page.contact');
    }

    public function getAbout() {
        return view('Page.about');
    }
}
