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
use App\User;
use Auth;
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

    public function getcheckout() {
        if(Session('cart')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $product_cart = $cart->items;
            $totalPrice = $cart->totalPrice;
        }
        return view('Page.DatHang', compact('product_cart', 'totalPrice'));
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
        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        session::forget('cart');
        return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
    }

    public function getLogin(){
        return view('Page.dangnhap');
    }

    public function getSignin(){
        return view('Page.dangky');
    }

    public function postSignin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'pass'=>'required|min:6|max:20',
                'fullname' =>'required',
                'repass' => 'required|same:pass'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'pass.required'=>'Vui lòng nhập mật khẩu',
                'pass.min'=>'Mật khẩu ít nhất 6 kí tự',
                'pass.max'=>'Mật khẩu không quá 20 kí tự',
                'repass.same'=> 'Mật khẩu không giống nhau'
            ]
        );
        $user = new User;
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = $req->pass;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thongbao', 'Đăng ký thành công');
    }

    public function postLogin(Request $req){
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
            return redirect()->back()->with(['flag'=>'success','massage'=>'đăng nhập thành công']);
        } else {
            return redirect()->back()->with(['flag'=>'danger','massage'=>'đăng nhập thất bại']);
        }
    }
    public function getlogout(){
        Auth::logout();
        return redirect()->route('trangchu');
    }

    public function getSearchProduct(Request $req){
        $product = Product::where('name', 'like', '%'.$req->search_pro.'%')
                            ->orwhere('unit_price', $req->search_pro)
                            ->get();
        return view('Page.Search', compact('product'));
    }
}
