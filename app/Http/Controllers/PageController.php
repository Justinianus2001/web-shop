<?php

namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Slide;
use App\Models\User;
use Auth;
use Hash;
use Session;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex() {
        $slide = Slide::all();
        $new_product = Product::where('new', 1)->get();
        $sale_product = Product::where('promotion_price', '<>', 0)->get();
        return view('page.index', compact('slide', 'new_product', 'sale_product'));
    }

    public function getProductGrid($type) {
        if ($type == -1) {
            $list_product = Product::where('promotion_price', '<>', 0)->get();
        } elseif ($type == 0) {
            $list_product = Product::where('new', 1)->get();
        } else {
            $list_product = Product::where('id_type', $type)->get();
        }
        return view('page.product_grid', compact('type', 'list_product'));
    }

    public function getProductList($type) {
        if ($type == -1) {
            $list_product = Product::where('promotion_price', '<>', 0)->get();
        } elseif ($type == 0) {
            $list_product = Product::where('new', 1)->get();
        } else {
            $list_product = Product::where('id_type', $type)->get();
        }
        return view('page.product_list', compact('type', 'list_product'));
    }

    public function getProduct(Request $request) {
        $product = Product::where('id', $request->id)->first();
        $other_same_product = Product::where('id_type', $product->id_type)->where('id', '<>', $product->id)->get();
        $other_diff_product = Product::where('id_type', '<>', $product->id_type)->inRandomOrder()->limit(5)->get();
        return view('page.product', compact('product', 'other_same_product', 'other_diff_product'));
    }

    public function getContact() {
        return view('page.contact');
    }

    public function getAddToCart(Request $request, $id) {
        if (Auth::check()) {
            $product = Product::find($id);
            $oldCart = Session('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->add($product, $id);
            $request->session()->put('cart', $cart);
            return redirect()->back();
        } else {
            return redirect()->route('login');
        }
    }

    public function getDelCart(Request $request, $id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckOut() {
        if (Auth::check()) {
            return view('page.checkout');
        } else {
            return redirect()->route('login');
        }
    }

    public function postCheckOut(Request $request) {
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone;
        $customer->note = $request->note;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->payment_method;
        $bill->note = $request->note;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price'] / $value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back();
    }

    public function getLogin() {
        if (Auth::check()) {
            return redirect()->route('index');
        } else {
            return view('page.login');
        }
    }

    public function postLogin(Request $request) {
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'
            ], [
                'email.required' => 'Email not null',
                'email.email' => 'Wrong email format',
                'password.required' => 'Password not null',
                'password.min' => 'Password length must contain at least 6 characters',
                'password.max' => 'Password length must contain at most 20 characters'
            ]
        );
        $credentials = array('email' => $request->email, 'password' => $request->password);
        if (Auth::attempt($credentials)) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('index');
    }

    public function getSignUp() {
        return view('page.signup');
    }

    public function postSignUp(Request $request) {
        $this->validate($request,
            [
                'email' => 'required|email|unique:users,email',
                'name' => 'required',
                'password' => 'required|min:6|max:20',
                're_password' => 'required|same:password'
            ], [
                'email.required' => 'Email not null',
                'email.email' => 'Wrong email format',
                'email.unique' => 'Invalid email',
                'name.required' => 'Name not null',
                'password.required' => 'Password not null',
                'password.min' => 'Password length must contain at least 6 characters',
                'password.max' => 'Password length must contain at most 20 characters',
                're_password.required' => 'Confirm password not null',
                're_password.same' => 'Confirm password not equal password'
            ]
        );
        $user = new User();
        $user->full_name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->back();
    }

    public function getSearch(Request $request) {
        $slide = Slide::all();
        $search_product = Product::where('name', 'like', '%' . $request->key . '%')
                                ->orWhere('unit_price', 'like', $request->key)
                                ->orWhere('promotion_price', 'like', $request->key)
                                ->orWhere('unit', 'like', '%' . $request->key . '%')->get();
        return view('page.search', compact('slide', 'search_product'));
    }
}
