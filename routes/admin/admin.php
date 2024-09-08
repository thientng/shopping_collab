<?php 

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\SliderAdminController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\ImportProductController;

Route::get('admin/login',[
    'as' => 'admin.login',
    'uses' => 'App\Http\Controllers\AdminController@loginAdmin'
]);

// route get khi có form Post thì khi ấn submit nếu không định nghĩa action thì nó sẽ tự độg gọi đến chính route đấy có method POST(nếu có)
Route::post('admin/login',[        
    'uses' => 'App\Http\Controllers\AdminController@postLoginAdmin'
]);


Route::prefix('admin')->middleware(['admin'])->group(function () { // Route prefix là nhóm tất cả đường dẫn con (hoặc Route)nằm trong và trùng đường dẫn cha
    Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::get('/',function () {
        return view('admin.admin');
    });
    Route::get('',function () {
        return view('admin.admin');
    });

    Route::get('/dashboard',function () {
        return view('admin.admin');
    })->name('admin.index');
    
    Route::prefix('categories')->group(function () {

        Route::get('/',[CategoryController::class, 'index'])->name('category.index');

        Route::get('create', [ // route nhập dữ liệu
            // key as để đặt tên cho router, key uses là để gọi controller
            'as' => 'category.create', // tên Router
            'uses' => 'App\Http\Controllers\CategoryController@create', // gọi controller(có 2 cách)
            // 'middleware' => 'can:category-create',
        ]);
        
        /* gọi controller và đặt tên router theo cách thông thường 
        Route::get('create',[CategoryController::class, 'create'])->name('category.create');
        */

        Route::post('store', [ // route nhận dữ liệu qua request và xử lí (thêm vào database)
            'as' => 'category.store',
            'uses' => 'App\Http\Controllers\CategoryController@store', // gọi controller(có 2 cách)
        ]);

        Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('update/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

    });

    Route::prefix('menus')->group(function () {
        Route::get('/',[
            'as' => 'menus.index',
            'uses' => 'App\Http\Controllers\MenuController@index'
        ]);

        Route::get('create', [ 
            'as' => 'menus.create', 
            'uses' => 'App\Http\Controllers\MenuController@create',
            // 'middleware' => 'can:menu-update',
        ]);

        Route::post('store', [ 
            'as' => 'menus.store',
            'uses' => 'App\Http\Controllers\MenuController@store',
        ]);

        Route::get('edit/{id}',[MenuController::class,'edit'])->name('menus.edit');
        Route::post('update/{id}',[MenuController::class,'update'])->name('menus.update');
        Route::get('delete/{id}',[MenuController::class,'delete'])->name('menus.delete');

    });

    Route::prefix('product')->group(function () {

        Route::get('/',[AdminProductController::class,'index'])->name('product.index');

        Route::get('create', [ 
            'as' => 'product.create', 
            'uses' => 'App\Http\Controllers\AdminProductController@create',
            // 'middleware' => 'can:product-create',
        ]);

        Route::post('store',[
            'as' =>  'product.store',
            'uses' => 'App\Http\Controllers\AdminProductController@store',
            // 'middleware' => 'can:product-create',
            
        ]);

        Route::get('edit/{id}',[AdminProductController::class,'edit'])->name('product.edit');
        Route::post('update/{id}',[AdminProductController::class,'update'])->name('product.update');
        Route::get('delete/{id}',[AdminProductController::class,'delete'])->name('product.delete');

        Route::get('detail/{id}', [AdminProductController::class, 'detail'])->name('product.detail');
        Route::post('detail/{id}', [AdminProductController::class, 'detailSave']);
        Route::get('detailDelete/{id}', [AdminProductController::class, 'detailDelete']);

    });

    Route::prefix('slider')->group(function () {
        Route::get('/',[SliderAdminController::class,'index'])->name('slider.index');
        Route::get('create', [ 
            'as' => 'slider.create', 
            'uses' => 'App\Http\Controllers\SliderAdminController@create',
            // 'middleware' => 'can:slider-update',
        ]);
        Route::post('store', [ 
            'as' => 'slider.store', 
            'uses' => 'App\Http\Controllers\SliderAdminController@store',
            // 'middleware' => 'can:slider-update',
        ]);

        Route::get('edit/{id}',[SliderAdminController::class,'edit'])->name('slider.edit');
        Route::post('update/{id}',[SliderAdminController::class,'update'])->name('slider.update');
        Route::get('delete/{id}',[SliderAdminController::class,'delete'])->name('slider.delete');
    });

    Route::prefix('settings')->group(function () {
        Route::get('/',[AdminSettingController::class,'index'])->name('settings.index');
        Route::get('create',[AdminSettingController::class,'create'])->name('settings.create');
        Route::post('store',[AdminSettingController::class,'store'])->name('settings.store');
        Route::get('edit/{id}',[AdminSettingController::class,'edit'])->name('settings.edit');
        Route::post('update/{id}',[AdminSettingController::class,'update'])->name('settings.update');
        Route::get('delete/{id}',[AdminSettingController::class,'delete'])->name('settings.delete');
    });

    Route::prefix('users')->group(function () {
        Route::get('/',[AdminUserController::class,'index'])->name('users.index');
        Route::get('create',[AdminUserController::class,'create'])->name('users.create');
        Route::post('store',[AdminUserController::class,'store'])->name('users.store');
        Route::get('edit/{id}',[AdminUserController::class,'edit'])->name('users.edit');
        Route::post('update/{id}',[AdminUserController::class,'update'])->name('users.update');
        Route::get('delete/{id}',[AdminUserController::class,'delete'])->name('users.delete');
    });
    
    Route::prefix('roles')->group(function () {
        Route::get('/',[AdminRoleController::class,'index'])->name('roles.index');
        Route::get('create',[AdminRoleController::class,'create'])->name('roles.create');
        Route::post('store',[AdminRoleController::class,'store'])->name('roles.store');
        Route::get('edit/{id}',[AdminRoleController::class,'edit'])->name('roles.edit');
        Route::post('update/{id}',[AdminRoleController::class,'update'])->name('roles.update');
        Route::get('delete/{id}',[AdminRoleController::class,'delete'])->name('roles.delete');
    });
    Route::prefix('attributes')->group(function () {
        Route::get('/',[AttributeController::class,'index'])->name('attributes.index');
        Route::get('create',[AttributeController::class,'create'])->name('attributes.create');
        Route::post('store',[AttributeController::class,'store'])->name('attributes.store');
        Route::get('edit/{id}-{nameType}',[AttributeController::class,'edit'])->name('attributes.edit');
        Route::post('update/{id}',[AttributeController::class,'update'])->name('attributes.update');
        Route::get('delete/{id}',[AttributeController::class,'delete'])->name('attributes.delete');
    });

    Route::prefix('import')->group(function (){
        Route::get('/', [ImportProductController::class, 'index'])->name('import.index');
        // Route::get('product-model/{id}', [ImportProductController::class, 'productModel'])->name('import.model');
        Route::get('add', [ImportProductController::class, 'add'])->name('import.create');
        Route::post('add', [ImportProductController::class, 'store']);
        Route::any('save/{id}', [ImportProductController::class, 'save']);
        Route::get('detail/{id}', [ImportProductController::class, 'detail'])->name('import.detail');
    });

    Route::prefix('order')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index'])->name('admin.order.index');

        Route::get('/detail/{id}', [AdminOrderController::class, 'detail'])->name('order.detail');
        Route::get('/detailUpdate/{id}', [AdminOrderController::class, 'detailUpdate'])->name('order.detail-update');
        Route::get('/detailUpdateCancel/{id}', [AdminOrderController::class, 'detailUpdateCancel'])->name('order.detail-cancel');

        Route::get('/ship', [AdminOrderController::class, 'ship'])->name('order.ship');
        Route::get('/shipUpdate/{id}', [AdminOrderController::class, 'shipUpdate'])->name('order.ship-update');
        Route::get('/shipCancel/{id}', [AdminOrderController::class, 'shipCancel'])->name('order.ship-cancel');

        Route::get('/bill', [AdminOrderController::class, 'bill'])->name('order.bill');
        Route::get('/cancel', [AdminOrderController::class, 'cancel'])->name('order.cancel');

    });
    
    Route::get('laravel-filemanager',function(){
        return view('admin.file_manager.index');
    })->name('file_manager.index');

});