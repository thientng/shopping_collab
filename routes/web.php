<?php

use App\Http\Controllers\LoginGoogleController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\ClientCartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CartController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ClientController::class,'index'])->name('home');


Route::get('test-mail', [AuthController::class, 'mail']);

// Route cho đăng nhập
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// Route cho đăng ký
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Route cho đăng xuất
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('guest');
// Gửi xác nhận Mail
Route::get('actived/{id}/{token}', [AuthController::class, 'active'])->name('customer.active');

// show cart
Route::prefix('cart')->group(function () {
    Route::get('/', [ClientController::class,'cart'])->name('home.cart');
    Route::get('/add/{id}', [CartController::class,'add'])->name('cart.add');
    Route::get('/update/{id}', [CartController::class,'update'])->name('cart.update');
    Route::get('/delete/{id}', [CartController::class,'delete'])->name('cart.delete');
    Route::get('/clear', [CartController::class,'clear'])->name('cart.clear');
});

Route::prefix('home')->group(function () {
    Route::get('/',[ClientController::class,'index'])->name('home.index');

    Route::get('shop',[ClientController::class,'shop'])->name('home.san-pham');

    Route::prefix('product')->group(function () {
        Route::get('detail/{id}', [ClientController::class,'productDetail'])->name('home.product-detail');
        Route::post('/update-cart', [ClientController::class,'updateCart'])->name('product.update-cart');
        Route::post('/delete-cart', [ClientController::class,'deleteCart'])->name('product.delete-cart');
        Route::post('/quantity-check/{id}', [ClientController::class,'quantityCheck'])->name('product.quantity-check');
        Route::get('/add-to-cart/{id}', [ClientController::class,'addToCart'])->name('product.add-to-cart');
        route::post('/cart/{id}', [ClientCartController::class,'productCart'])->name('product.detail-cart');
    });

    Route::get('category/{slug}/{id}', [
        'as' => 'home.category.product',
        'uses' => 'App\Http\Controllers\ClientCategoryController@index'
    ]);
    Route::prefix('order')->group(function () {
        Route::get('/',[OrderController::class,'index'])->name('order.index');
        Route::post('/',[OrderController::class,'store']);
        
        Route::get('verify/{token}-{id}',[OrderController::class,'verify'])->name('order.verify');
    });

});

// Route::get('auth/google/redirect', function () {
//     return Socialite::driver('google')->redirect();
// });
 
// Route::get('auth/google/callback', function () {
//     $user = Socialite::driver('google')->user();
    
//     dd($user);
// });

Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback']);


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});