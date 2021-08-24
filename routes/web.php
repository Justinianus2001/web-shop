<?php

use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('admin.login')->group(function() {
    Route::get('admin/dashboard', [
        'as' => 'admin/dashboard',
        'uses' => 'App\Http\Controllers\AdminController@getDashboard'
    ]);

    Route::get('admin/slide/list', [
        'as' => 'admin/slide/list',
        'uses' => 'App\Http\Controllers\AdminController@getSlideList'
    ]);

    Route::get('admin/slide/add', [
        'as' => 'admin/slide/add',
        'uses' => 'App\Http\Controllers\AdminController@getSlideAdd'
    ]);

    Route::post('admin/slide/add', [
        'as' => 'admin/slide/add',
        'uses' => 'App\Http\Controllers\AdminController@postSlideAdd'
    ]);

    Route::get('admin/slide/edit/{id}', [
        'as' => 'admin/slide/edit',
        'uses' => 'App\Http\Controllers\AdminController@getSlideEdit'
    ]);

    Route::post('admin/slide/edit/{id}', [
        'as' => 'admin/slide/edit',
        'uses' => 'App\Http\Controllers\AdminController@postSlideEdit'
    ]);

    Route::get('admin/slide/delete/{id}', [
        'as' => 'admin/slide/delete',
        'uses' => 'App\Http\Controllers\AdminController@getSlideDelete'
    ]);

    Route::get('admin/type-product/list', [
        'as' => 'admin/type-product/list',
        'uses' => 'App\Http\Controllers\AdminController@getTypeProductList'
    ]);

    Route::get('admin/type-product/add', [
        'as' => 'admin/type-product/add',
        'uses' => 'App\Http\Controllers\AdminController@getTypeProductAdd'
    ]);

    Route::post('admin/type-product/add', [
        'as' => 'admin/type-product/add',
        'uses' => 'App\Http\Controllers\AdminController@postTypeProductAdd'
    ]);

    Route::get('admin/type-product/edit/{id}', [
        'as' => 'admin/type-product/edit',
        'uses' => 'App\Http\Controllers\AdminController@getTypeProductEdit'
    ]);

    Route::post('admin/type-product/edit/{id}', [
        'as' => 'admin/type-product/edit',
        'uses' => 'App\Http\Controllers\AdminController@postTypeProductEdit'
    ]);

    Route::get('admin/type-product/delete/{id}', [
        'as' => 'admin/type-product/delete',
        'uses' => 'App\Http\Controllers\AdminController@getTypeProductDelete'
    ]);

    Route::get('admin/product/list', [
        'as' => 'admin/product/list',
        'uses' => 'App\Http\Controllers\AdminController@getProductList'
    ]);

    Route::get('admin/product/add', [
        'as' => 'admin/product/add',
        'uses' => 'App\Http\Controllers\AdminController@getProductAdd'
    ]);

    Route::post('admin/product/add', [
        'as' => 'admin/product/add',
        'uses' => 'App\Http\Controllers\AdminController@postProductAdd'
    ]);

    Route::get('admin/product/edit/{id}', [
        'as' => 'admin/product/edit',
        'uses' => 'App\Http\Controllers\AdminController@getProductEdit'
    ]);

    Route::post('admin/product/edit/{id}', [
        'as' => 'admin/product/edit',
        'uses' => 'App\Http\Controllers\AdminController@postProductEdit'
    ]);

    Route::get('admin/product/delete/{id}', [
        'as' => 'admin/product/delete',
        'uses' => 'App\Http\Controllers\AdminController@getProductDelete'
    ]);

    Route::get('admin/user/list', [
        'as' => 'admin/user/list',
        'uses' => 'App\Http\Controllers\AdminController@getUserList'
    ]);

    Route::get('admin/user/add', [
        'as' => 'admin/user/add',
        'uses' => 'App\Http\Controllers\AdminController@getUserAdd'
    ]);

    Route::post('admin/user/add', [
        'as' => 'admin/user/add',
        'uses' => 'App\Http\Controllers\AdminController@postUserAdd'
    ]);

    Route::get('admin/user/edit/{id}', [
        'as' => 'admin/user/edit',
        'uses' => 'App\Http\Controllers\AdminController@getUserEdit'
    ]);

    Route::post('admin/user/edit/{id}', [
        'as' => 'admin/user/edit',
        'uses' => 'App\Http\Controllers\AdminController@postUserEdit'
    ]);

    Route::get('admin/user/delete/{id}', [
        'as' => 'admin/user/delete',
        'uses' => 'App\Http\Controllers\AdminController@getUserDelete'
    ]);

    Route::get('admin/admin/list', [
        'as' => 'admin/admin/list',
        'uses' => 'App\Http\Controllers\AdminController@getAdminList'
    ]);

    Route::get('admin/admin/add', [
        'as' => 'admin/admin/add',
        'uses' => 'App\Http\Controllers\AdminController@getAdminAdd'
    ]);

    Route::post('admin/admin/add', [
        'as' => 'admin/admin/add',
        'uses' => 'App\Http\Controllers\AdminController@postAdminAdd'
    ]);

    Route::get('admin/admin/edit/{id}', [
        'as' => 'admin/admin/edit',
        'uses' => 'App\Http\Controllers\AdminController@getAdminEdit'
    ]);

    Route::post('admin/admin/edit/{id}', [
        'as' => 'admin/admin/edit',
        'uses' => 'App\Http\Controllers\AdminController@postAdminEdit'
    ]);

    Route::get('admin/admin/delete/{id}', [
        'as' => 'admin/admin/delete',
        'uses' => 'App\Http\Controllers\AdminController@getAdminDelete'
    ]);

    Route::get('admin/bill/list', [
        'as' => 'admin/bill/list',
        'uses' => 'App\Http\Controllers\AdminController@getBillList'
    ]);

    Route::get('admin/bill/reject/{id}', [
        'as' => 'admin/bill/reject',
        'uses' => 'App\Http\Controllers\AdminController@getBillReject'
    ]);

    Route::get('admin/bill/accept/{id}', [
        'as' => 'admin/bill/accept',
        'uses' => 'App\Http\Controllers\AdminController@getBillAccept'
    ]);

    Route::get('admin/bill/finish/{id}', [
        'as' => 'admin/bill/finish',
        'uses' => 'App\Http\Controllers\AdminController@getBillFinish'
    ]);

    Route::get('admin/bill/detail/{id}', [
        'as' => 'admin/bill/detail',
        'uses' => 'App\Http\Controllers\AdminController@getBillDetail'
    ]);

    Route::get('admin/logout', [
        'as' => 'admin/logout',
        'uses' => 'App\Http\Controllers\AdminController@getLogout'
    ]);
});

Route::get('admin/login', [
    'as' => 'admin/login',
    'uses' => 'App\Http\Controllers\AdminController@getLogin'
]);

Route::post('admin/login', [
    'as' => 'admin/login',
    'uses' => 'App\Http\Controllers\AdminController@postLogin'
]);

Route::get('index', [
    'as' => 'index',
    'uses' => 'App\Http\Controllers\PageController@getIndex'
]);

Route::get('product-grid/{type}', [
    'as' => 'product-grid',
    'uses' => 'App\Http\Controllers\PageController@getProductGrid'
]);

Route::get('product-list/{type}', [
    'as' => 'product-list',
    'uses' => 'App\Http\Controllers\PageController@getProductList'
]);

Route::get('product/{id}', [
    'as' => 'product',
    'uses' => 'App\Http\Controllers\PageController@getProduct'
]);

Route::get('contact', [
    'as' => 'contact',
    'uses' => 'App\Http\Controllers\PageController@getContact'
]);

Route::middleware('user.login')->group(function() {
    Route::get('add-to-cart/{id}', [
        'as' => 'add-to-cart',
        'uses' => 'App\Http\Controllers\PageController@getAddToCart'
    ]);
    
    Route::get('del-cart/{id}', [
        'as' => 'del-cart',
        'uses' => 'App\Http\Controllers\PageController@getDelCart'
    ]);
    
    Route::get('checkout', [
        'as' => 'checkout',
        'uses' => 'App\Http\Controllers\PageController@getCheckOut'
    ]);
    
    Route::post('checkout', [
        'as' => 'checkout',
        'uses' => 'App\Http\Controllers\PageController@postCheckOut'
    ]);
    
    Route::get('order-history', [
        'as' => 'order-history',
        'uses' => 'App\Http\Controllers\PageController@getOrderHistory'
    ]);
    
    Route::get('order-history/detail/{id}', [
        'as' => 'order-history/detail',
        'uses' => 'App\Http\Controllers\PageController@getOrderHistoryDetail'
    ]);
    
    Route::get('edit-info', [
        'as' => 'edit-info',
        'uses' => 'App\Http\Controllers\PageController@getEditInfo'
    ]);
    
    Route::post('edit-info', [
        'as' => 'edit-info',
        'uses' => 'App\Http\Controllers\PageController@postEditInfo'
    ]);

    Route::get('logout', [
        'as' => 'logout',
        'uses' => 'App\Http\Controllers\PageController@getLogout'
    ]);
});

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');
Route::middleware('auth')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

// Route::get('login', [
//     'as' => 'login',
//     'uses' => 'App\Http\Controllers\PageController@getLogin'
// ]);

// Route::post('login', [
//     'as' => 'login',
//     'uses' => 'App\Http\Controllers\PageController@postLogin'
// ]);

Route::get('signup', [
    'as' => 'signup',
    'uses' => 'App\Http\Controllers\PageController@getSignUp'
]);

Route::post('signup', [
    'as' => 'signup',
    'uses' => 'App\Http\Controllers\PageController@postSignUp'
]);

Route::get('search', [
    'as' => 'search',
    'uses' => 'App\Http\Controllers\PageController@getSearch'
]);