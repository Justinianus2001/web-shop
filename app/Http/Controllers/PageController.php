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
        $new_product = Product::where('new', 1)->inRandomOrder()->get();
        $sale_product = Product::where('promotion_price', '<>', 0)->inRandomOrder()->get();
        return view('page.index', compact('slide', 'new_product', 'sale_product'));
    }

    public function getProductGrid($type) {
        if ($type == -1) {
            $list_product = Product::where('promotion_price', '<>', 0)->get();
            $sub_product = Product::where('promotion_price', '<>', 0)->paginate(15);
        } elseif ($type == 0) {
            $list_product = Product::where('new', 1)->get();
            $sub_product = Product::where('new', 1)->paginate(15);
        } else {
            $list_product = Product::where('id_type', $type)->get();
            $sub_product = Product::where('id_type', $type)->paginate(15);
        }
        return view('page.product_grid', compact('type', 'list_product', 'sub_product'));
    }

    public function getProductList($type) {
        if ($type == -1) {
            $list_product = Product::where('promotion_price', '<>', 0)->get();
            $sub_product = Product::where('promotion_price', '<>', 0)->paginate(10);
        } elseif ($type == 0) {
            $list_product = Product::where('new', 1)->get();
            $sub_product = Product::where('new', 1)->paginate(10);
        } else {
            $list_product = Product::where('id_type', $type)->get();
            $sub_product = Product::where('id_type', $type)->paginate(10);
        }
        return view('page.product_list', compact('type', 'list_product', 'sub_product'));
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
            $qty = 1;
            if (!empty($request->quantity)) {
                $qty = $request->quantity;
            }
            $product = Product::find($id);
            $oldCart = Session('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->add($product, $id, $qty);
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
            $user = Auth::user();
            return view('page.checkout', compact('user'));
        } else {
            return redirect()->route('login');
        }
    }

    public function postCheckOut(Request $request) {
        if (Auth::check()) {
            $cart = Session::get('cart');
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->gender = $request->gender;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->phone_number = $request->phone;
            $customer->note = $request->note;
            $customer->save();

            $user = Auth::user();

            $bill = new Bill;
            $bill->id_user = $user->id;
            $bill->id_customer = $customer->id;
            $bill->date_order = date('Y-m-d');
            $bill->total = $cart->totalPrice;
            $bill->payment = $request->payment_method;
            $bill->note = $request->note;
            $bill->status = 0;
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
            return redirect()->route('order-history');
        } else {
            return redirect()->route('login');
        }
    }

    public function getOrderHistory() {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $bill = Bill::where('id_user', $userId)->get();
            return view('page.order_history', compact('bill'));
        } else {
            return redirect()->route('login');
        }
    }

    public function getOrderHistoryDetail($id) {
        if (Auth::check()) {
            $list_product = BillDetail::where('id_bill', $id)->leftJoin('products', 'id_product', 'products.id')->get();
            return view('page.order_history_detail', compact('list_product'));
        } else {
            return redirect()->route('login');
        }
    }

    public function getLogin() {
        if (Auth::check()) {
            return redirect()->route('index');
        } else {
            return view('page.login');
        }
    }

    public function postLogin(Request $request) {
        $this->validate($request, [
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
            return redirect()->route('index');
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
        $this->validate($request, [
                'email' => 'required|email|unique:users,email',
                'name' => 'required',
                'phone' => 'required',
                'password' => 'required|min:6|max:20',
                're_password' => 'required|same:password',
                'address' => 'required'
            ], [
                'email.required' => 'Email not null',
                'email.email' => 'Wrong email format',
                'email.unique' => 'Email has been used',
                'name.required' => 'Name not null',
                'phone.required' => 'Phone not null',
                'password.required' => 'Password not null',
                'password.min' => 'Password length must contain at least 6 characters',
                'password.max' => 'Password length must contain at most 20 characters',
                're_password.required' => 'Confirm password not null',
                're_password.same' => 'Confirm password not equal password',
                'address.required' => 'Address not null'
            ]
        );
        $user = new User;
        $user->full_name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->route('login');
    }

    public function getEditInfo() {
        if (Auth::check()) {
            $user = Auth::user();
            return view('page.info_edit', compact('user'));
        } else {
            return redirect()->route('login');
        }
    }

    public function postEditInfo(Request $request) {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $this->validate($request, [
                    'email' => 'required|email|unique:admins,username,' . $userId,
                    'full_name' => 'required',
                    'phone' => 'required',
                    'new_password' => 'nullable|min:6|max:20',
                    'address' => 'required'
                ], [
                    'email.required' => 'Email not null',
                    'email.email' => 'Wrong email format',
                    'email.unique' => 'Email has been used',
                    'full_name.required' => 'Full Name not null',
                    'phone.required' => 'Phone not null',
                    'new_password.min' => 'Password length must contain at least 6 characters',
                    'new_password.max' => 'Password length must contain at most 20 characters',
                    'address.required' => 'Address not null'
                ]
            );
            $user = User::find($userId);
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            if (!empty($request->new_password)) {
                $user->password = Hash::make($request->new_password);
            }
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();
            return redirect()->back();
        } else {
            return redirect()->route('login');
        }
    }

    public function getSearch(Request $request) {
        $slide = Slide::all();
        $search_product = Product::where('name', 'like', '%' . $request->key . '%')
                                ->orWhere('unit_price', 'like', $request->key)
                                ->orWhere('promotion_price', 'like', $request->key)
                                ->orWhere('unit', 'like', '%' . $request->key . '%')->inRandomOrder()->get();
        return view('page.search', compact('slide', 'search_product'));
    }
}
