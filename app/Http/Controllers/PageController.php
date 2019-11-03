<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
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

    public function getToCart(Request $req,$id) {
        $product = Product::find($id);
        $oldcart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->add($product, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getDeleteItemCart($id) {
        $oldcart = session::has('cart') ? session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->removeItem($id);
        if(count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            session::forget('cart');
        }
        return redirect()->back();
    }

    public function postcheckout(Request $req) {
        //lay thong tin trong bang gio hang
        $cart = Session::get('cart');
        //lay thong tin trong bang khach hang
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->email;
        $customer->phone_number = $req->phone_number;
        $customer->note = $req->notes;
        $customer->save();
        //lay nhan vien trong bang hoa don
        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment;
        $bill->note = $req->notes;
        $bill->save();
        //lay thong tin chi tiet hoa don
        foreach ($cart['items'] as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail = save();
        }
        session::forget('cart');
        return redirect()->back()->with('Thông báo', 'Đặt hàng thành công');
    }
}
