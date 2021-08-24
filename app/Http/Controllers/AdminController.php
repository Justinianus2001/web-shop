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
        return view('admin.dashboard');
    }

    public function getSlideList() {
        $slide = Slide::all();
        return view('admin.slide_list', compact('slide'));
    }

    public function getSlideAdd() {
        return view('admin.slide_add');
    }

    public function postSlideAdd(Request $request) {
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
    }

    public function getSlideEdit($id) {
        $slide = Slide::find($id);
        return view('admin.slide_edit', compact('slide'));
    }

    public function postSlideEdit(Request $request, $id) {
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
    }

    public function getSlideDelete($id) {
        $slide = Slide::find($id);
        unlink('source/images/' . $slide->image);
        $slide->delete();
        return redirect()->back();
    }

    public function getTypeProductList() {
        $type_product = ProductType::all();
        return view('admin.type_product_list', compact('type_product'));
    }

    public function getTypeProductAdd() {
        return view('admin.type_product_add');
    }

    public function postTypeProductAdd(Request $request) {
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
    }

    public function getTypeProductEdit($id) {
        $type_product = ProductType::find($id);
        return view('admin.type_product_edit', compact('type_product'));
    }

    public function postTypeProductEdit(Request $request, $id) {
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
    }

    public function getTypeProductDelete($id) {
        $type_product = ProductType::find($id);
        unlink('source/images/products/' . $type_product->image);
        $type_product->delete();
        return redirect()->back();
    }

    public function getProductList() {
        $product = Product::all();
        return view('admin.product_list', compact('product'));
    }

    public function getProductAdd() {
        $type_product = ProductType::all();
        return view('admin.product_add', compact('type_product'));
    }

    public function postProductAdd(Request $request) {
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
    }

    public function getProductEdit($id) {
        $product = Product::find($id);
        $type_product = ProductType::all();
        return view('admin.product_edit', compact('product', 'type_product'));
    }

    public function postProductEdit(Request $request, $id) {
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
    }

    public function getProductDelete($id) {
        $product = Product::find($id);
        unlink('source/images/products/' . $product->image);
        $product->delete();
        return redirect()->back();
    }

    public function getUserList() {
        $user = User::all();
        return view('admin.user_list', compact('user'));
    }

    public function getUserAdd() {
        return view('admin.user_add');
    }

    public function postUserAdd(Request $request) {
        $this->validate($request, [
                'email' => 'required|email|unique:users,email',
                'name' => 'required',
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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->route('admin/user/list');
    }

    public function getUserEdit($id) {
        $user = User::find($id);
        return view('admin.user_edit', compact('user'));
    }

    public function postUserEdit(Request $request, $id) {
        $this->validate($request, [
                'email' => 'required|email|unique:admins,username,' . $id,
                'name' => 'required',
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
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->new_password)) {
            $user->password = Hash::make($request->new_password);
        }
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->route('admin/user/list');
    }

    public function getUserDelete($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function getAdminList() {
        $admin = Admin::all();
        return view('admin.admin_list', compact('admin'));
    }

    public function getAdminAdd() {
        return view('admin.admin_add');
    }

    public function postAdminAdd(Request $request) {
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
    }

    public function getAdminEdit($id) {
        $admin = Admin::find($id);
        return view('admin.admin_edit', compact('admin'));
    }

    public function postAdminEdit(Request $request, $id) {
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
    }

    public function getAdminDelete($id) {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->back();
    }

    public function getBillList() {
        $bill = Bill::all();
        return view('admin.bill_list', compact('bill'));
    }

    public function getBillReject($id) {
        $bill = Bill::find($id);
        $bill->status = -1;
        $bill->save();
        return redirect()->back();
    }

    public function getBillAccept($id) {
        $bill = Bill::find($id);
        $bill->status = 1;
        $bill->save();
        return redirect()->back();
    }

    public function getBillFinish($id) {
        $bill = Bill::find($id);
        $bill->status = 2;
        $bill->save();
        return redirect()->back();
    }

    public function getBillDetail($id) {
        $bill = Bill::find($id);
        $user = User::where('id', $bill->id_user)->first();
        $customer = Customer::where('id', $bill->id_customer)->first();
        $bill_detail = BillDetail::where('id_bill', $bill->id)->leftJoin('products', 'id_product', 'products.id')->get();
        return view('admin.bill_detail', compact('bill', 'user', 'customer', 'bill_detail', 'id'));
    }

    public function getLogin() {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin/dashboard');
        } else {
            return view('admin.auth.login');
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
