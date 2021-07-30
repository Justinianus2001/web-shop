<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\BillDetail;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
use Auth;
use Hash;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getDashboard() {
        if (Auth::guard('admin')->check()) {
            return view('admin.dashboard');
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getSlideList() {
        if (Auth::guard('admin')->check()) {
            $slide = Slide::all();
            return view('admin.slide_list', compact('slide'));
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getSlideAdd() {
        if (Auth::guard('admin')->check()) {
            return view('admin.slide_add');
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function postSlideAdd(Request $request) {
        if (Auth::guard('admin')->check()) {
            $this->validate($request,
                [
                    'link' => 'required',
                    'image' => 'required'
                ], [
                    'link.required' => 'Link not null',
                    'image.required' => 'Image not null'
                ]
            );
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('source/images', $name);
            $slide = new Slide;
            $slide->link = $request->link;
            $slide->image = $name;
            $slide->save();
            return redirect()->route('admin/slide/list');
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getSlideEdit($id) {
        if (Auth::guard('admin')->check()) {
            $slide = Slide::find($id);
            return view('admin.slide_edit', compact('slide'));
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function postSlideEdit(Request $request, $id) {
        if (Auth::guard('admin')->check()) {
            $this->validate($request,
                [
                    'link' => 'required'
                ], [
                    'link.required' => 'Link not null'
                ]
            );
            $slide = Slide::find($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                unlink('source/images/' . $slide->image);
                $file->move('source/images', $name);
                $slide->image = $name;
            }
            $slide->link = $request->link;
            $slide->save();
            return redirect()->route('admin/slide/list');
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getSlideDelete($id) {
        if (Auth::guard('admin')->check()) {
            $slide = Slide::find($id);
            unlink('source/images/' . $slide->image);
            $slide->delete();
            return redirect()->back();
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getTypeProductList() {
        if (Auth::guard('admin')->check()) {
            $type_product = ProductType::all();
            return view('admin.type_product_list', compact('type_product'));
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getTypeProductAdd() {
        if (Auth::guard('admin')->check()) {
            return view('admin.type_product_add');
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function postTypeProductAdd(Request $request) {
        if (Auth::guard('admin')->check()) {
            $this->validate($request,
                [
                    'name' => 'required|unique:type_products,name',
                    'description' => 'required',
                    'image' => 'required'
                ], [
                    'name.required' => 'Name not null',
                    'name.unique' => 'Name has been used',
                    'description.required' => 'Description not null',
                    'image.required' => 'Image not null'
                ]
            );
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file->move('source/images/products', $file_name);
            $type_product = new ProductType;
            $type_product->name = $request->name;
            $type_product->description = $request->description;
            $type_product->image = $file_name;
            $type_product->save();
            return redirect()->route('admin/type-product/list');
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getTypeProductEdit($id) {
        if (Auth::guard('admin')->check()) {
            $type_product = ProductType::find($id);
            return view('admin.type_product_edit', compact('type_product'));
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function postTypeProductEdit(Request $request, $id) {
        if (Auth::guard('admin')->check()) {
            $this->validate($request,
                [
                    'name' => 'required|unique:type_products,name,' . $id,
                    'description' => 'required'
                ], [
                    'name.required' => 'Name not null',
                    'name.unique' => 'Name has been used',
                    'description.required' => 'Description not null'
                ]
            );
            $type_product = ProductType::find($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = $file->getClientOriginalName();
                unlink('source/images/products/' . $type_product->image);
                $file->move('source/images/products', $file_name);
                $type_product->image = $file_name;
            }
            $type_product->name = $request->name;
            $type_product->description = $request->description;
            $type_product->save();
            return redirect()->route('admin/type-product/list');
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getTypeProductDelete($id) {
        if (Auth::guard('admin')->check()) {
            $type_product = ProductType::find($id);
            unlink('source/images/products/' . $type_product->image);
            $type_product->delete();
            return redirect()->back();
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getProductList() {
        if (Auth::guard('admin')->check()) {
            $product = Product::all();
            return view('admin.product_list', compact('product'));
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getProductAdd() {
        if (Auth::guard('admin')->check()) {
            $type_product = ProductType::all();
            return view('admin.product_add', compact('type_product'));
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function postProductAdd(Request $request) {
        if (Auth::guard('admin')->check()) {
            $this->validate($request,
                [
                    'name' => 'required|unique:products,name',
                    'id_type' => 'required|exists:type_products,id',
                    'description' => 'required',
                    'unit_price' => 'required|numeric',
                    'promotion_price' => 'required|numeric|lt:unit_price',
                    'image' => 'required',
                    'unit' => 'required',
                    'new' => 'required|boolean'
                ], [
                    'name.required' => 'Name not null',
                    'name.unique' => 'Name has been used',
                    'id_type.required' => 'ID Type not null',
                    'id_type.exists' => 'ID Type not exist',
                    'description.required' => 'Description not null',
                    'unit_price.required' => 'Unit Price not null',
                    'unit_price.numeric' => 'Unit Price must be number value',
                    'promotion_price.required' => 'Promotion Price not null',
                    'promotion_price.numeric' => 'Promotion Price must be number value',
                    'promotion.lt' => 'Promotion Price must less than Unit Price',
                    'image.required' => 'Image not null',
                    'unit.required' => 'Unit not null',
                    'new.required' => 'New not null',
                    'new.boolean' => 'New must be boolean value'
                ]
            );
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file->move('source/images/products', $file_name);
            $product = new Product;
            $product->name = $request->name;
            $product->id_type = $request->id_type;
            $product->description = $request->description;
            $product->unit_price = $request->unit_price;
            $product->promotion_price = $request->promotion_price;
            $product->unit = $request->unit;
            $product->new = $request->new;
            $product->save();
            return redirect()->route('admin/product/list');
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getProductEdit($id) {
        if (Auth::guard('admin')->check()) {
            $product = Product::find($id);
            $type_product = ProductType::all();
            return view('admin.product_edit', compact('product', 'type_product'));
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function postProductEdit(Request $request, $id) {
        if (Auth::guard('admin')->check()) {
            $this->validate($request,
                [
                    'name' => 'required|unique:products,name,' . $id,
                    'id_type' => 'required|exists:type_products,id',
                    'description' => 'required',
                    'unit_price' => 'required|numeric',
                    'promotion_price' => 'required|numeric|lt:unit_price',
                    'unit' => 'required',
                    'new' => 'required|boolean'
                ], [
                    'name.required' => 'Name not null',
                    'name.unique' => 'Name has been used',
                    'id_type.required' => 'ID Type not null',
                    'id_type.exists' => 'ID Type not exist',
                    'description.required' => 'Description not null',
                    'unit_price.required' => 'Unit Price not null',
                    'unit_price.numeric' => 'Unit Price must be number value',
                    'promotion_price.required' => 'Promotion Price not null',
                    'promotion_price.numeric' => 'Promotion Price must be number value',
                    'promotion.lt' => 'Promotion Price must less than Unit Price',
                    'unit.required' => 'Unit not null',
                    'new.required' => 'New not null',
                    'new.boolean' => 'New must be boolean value'
                ]
            );
            $product = Product::find($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = $file->getClientOriginalName();
                unlink('source/images/products/' . $product->image);
                $file->move('source/images/products', $file_name);
                $product->image = $file_name;
            }
            $product->name = $request->name;
            $product->id_type = $request->id_type;
            $product->description = $request->description;
            $product->unit_price = $request->unit_price;
            $product->promotion_price = $request->promotion_price;
            $product->unit = $request->unit;
            $product->new = $request->new;
            $product->save();
            return redirect()->route('admin/product/list');
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getProductDelete($id) {
        if (Auth::guard('admin')->check()) {
            $product = Product::find($id);
            unlink('source/images/products/' . $product->image);
            $product->delete();
            return redirect()->back();
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getUserList() {
        if (Auth::guard('admin')->check()) {
            $user = User::all();
            return view('admin.user_list', compact('user'));
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getUserAdd() {
        if (Auth::guard('admin')->check()) {
            return view('admin.user_add');
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function postUserAdd(Request $request) {
        if (Auth::guard('admin')->check()) {
            $this->validate($request, [
                    'email' => 'required|email|unique:users,email',
                    'full_name' => 'required',
                    'phone' => 'required',
                    'password' => 'required|min:6|max:20',
                    'address' => 'required'
                ], [
                    'email.required' => 'Email not null',
                    'email.email' => 'Wrong email format',
                    'email.unique' => 'Email has been used',
                    'full_name.required' => 'Full Name not null',
                    'phone.required' => 'Phone not null',
                    'password.required' => 'Password not null',
                    'password.min' => 'Password length must contain at least 6 characters',
                    'password.max' => 'Password length must contain at most 20 characters',
                    'address.required' => 'Address not null'
                ]
            );
            $user = new User;
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();
            return redirect()->route('admin/user/list');
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getUserEdit($id) {
        if (Auth::guard('admin')->check()) {
            $user = User::find($id);
            return view('admin.user_edit', compact('user'));
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function postUserEdit(Request $request, $id) {
        if (Auth::guard('admin')->check()) {
            $this->validate($request, [
                    'email' => 'required|email|unique:admins,username,' . $id,
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
            $user = User::find($id);
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            if (!empty($request->new_password)) {
                $user->password = Hash::make($request->new_password);
            }
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();
            return redirect()->route('admin/user/list');
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getUserDelete($id) {
        if (Auth::guard('admin')->check()) {
            $user = User::find($id);
            $user->delete();
            return redirect()->back();
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getAdminList() {
        if (Auth::guard('admin')->check()) {
            $admin = Admin::all();
            return view('admin.admin_list', compact('admin'));
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getAdminAdd() {
        if (Auth::guard('admin')->check()) {
            return view('admin.admin_add');
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function postAdminAdd(Request $request) {
        if (Auth::guard('admin')->check()) {
            $this->validate($request, [
                    'username' => 'required|unique:admins,username',
                    'password' => 'required|min:6|max:20'
                ], [
                    'username.required' => 'Username not null',
                    'username.unique' => 'Username has been used',
                    'password.required' => 'Password not null',
                    'password.min' => 'Password length must contain at least 6 characters',
                    'password.max' => 'Password length must contain at most 20 characters'
                ]
            );
            $admin = new Admin;
            $admin->username = $request->username;
            $admin->password = Hash::make($request->password);
            $admin->save();
            return redirect()->route('admin/admin/list');
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getAdminEdit($id) {
        if (Auth::guard('admin')->check()) {
            $admin = Admin::find($id);
            return view('admin.admin_edit', compact('admin'));
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function postAdminEdit(Request $request, $id) {
        if (Auth::guard('admin')->check()) {
            $this->validate($request, [
                    'username' => 'required|unique:admins,username,' . $id,
                    'password' => 'nullable|min:6|max:20'
                ], [
                    'username.required' => 'Username not null',
                    'username.unique' => 'Username has been used',
                    'password.min' => 'Password length must contain at least 6 characters',
                    'password.max' => 'Password length must contain at most 20 characters'
                ]
            );
            $admin = Admin::find($id);
            $admin->username = $request->username;
            if (!empty($request->new_password)) {
                $admin->password = Hash::make($request->new_password);
            }
            $admin->save();
            return redirect()->route('admin/admin/list');
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getAdminDelete($id) {
        if (Auth::guard('admin')->check()) {
            $admin = Admin::find($id);
            $admin->delete();
            return redirect()->back();
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getBillList() {
        if (Auth::guard('admin')->check()) {
            $bill = Bill::all();
            return view('admin.bill_list', compact('bill'));
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getBillReject($id) {
        if (Auth::guard('admin')->check()) {
            $bill = Bill::find($id);
            $bill->status = -1;
            $bill->save();
            return redirect()->back();
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getBillAccept($id) {
        if (Auth::guard('admin')->check()) {
            $bill = Bill::find($id);
            $bill->status = 1;
            $bill->save();
            return redirect()->back();
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getBillFinish($id) {
        if (Auth::guard('admin')->check()) {
            $bill = Bill::find($id);
            $bill->status = 2;
            $bill->save();
            return redirect()->back();
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getBillDetail($id) {
        if (Auth::guard('admin')->check()) {
            $bill = Bill::find($id);
            $user = User::where('id', $bill->id_user)->first();
            $customer = Customer::where('id', $bill->id_customer)->first();
            $bill_detail = BillDetail::where('id_bill', $bill->id)->leftJoin('products', 'id_product', 'products.id')->get();
            return view('admin.bill_detail', compact('bill', 'user', 'customer', 'bill_detail', 'id'));
        } else {
            return redirect()->route('admin/login');
        }
    }

    public function getLogin() {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin/dashboard');
        } else {
            return view('admin.auth.login_admin');
        }
    }

    public function postLogin(Request $request) {
        $this->validate($request, [
                'username' => 'required',
                'password' => 'required|min:6|max:20'
            ], [
                'username.required' => 'Username not null',
                'password.required' => 'Password not null',
                'password.min' => 'Password length must contain at least 6 characters',
                'password.max' => 'Password length must contain at most 20 characters'
            ]
        );
        $credentials = array('username' => $request->username, 'password' => $request->password);
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin/dashboard');
        } else {
            $errors->add('Login failed', 'Invalid username or password');
            return redirect()->back();
        }
    }

    public function getLogout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
