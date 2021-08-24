<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/redirect', function (Request $request) {
    $query = http_build_query([
        'client_id' => 'client-id',
        'redirect_uri' => 'http://localhost/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);
    return redirect('http://127.0.0.1:8000/oauth/authorize?' . $query);
});

// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'auth',
// ], function ($router) {
//     Route::post('login', [AuthController::class, 'login']);
//     Route::post('logout', [AuthController::class, 'logout']);
//     Route::post('refresh', [AuthController::class, 'refresh']);
//     Route::post('me', [AuthController::class, 'me']);
//     Route::post('payload', [AuthController::class, 'payload']);
// });