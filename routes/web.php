<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth']);

Route::group(['middleware'=>'admin_auth'],function(){

    Route::get('admin/logout',function(){
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        return redirect('admin');
    });

    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('admin/category',[CategoryController::class,'index']);
    Route::get('admin/category/manage_category',[CategoryController::class,'manage_category']);
    Route::get('admin/category/manage_category/{id}',[CategoryController::class,'manage_category']);
    Route::post('admin/category/manage_category_process', [CategoryController::class,'manage_category_process'])
        ->name('category.manage_category_process');
    Route::get('admin/category/delete/{id}', [CategoryController::class,'delete']);
    Route::get('admin/category/status/{status}/{id}', [CategoryController::class,'status']);


    Route::get('admin/coupon',[CouponController::class,'index']);
    Route::get('admin/coupon/manage_coupon',[CouponController::class,'manage_coupon']);
    Route::get('admin/coupon/manage_coupon/{id}',[CouponController::class,'manage_coupon']);
    Route::post('admin/coupon/manage_coupon_process', [CouponController::class,'manage_coupon_process'])
        ->name('coupon.manage_coupon_process');
    Route::get('admin/coupon/delete/{id}', [CouponController::class,'delete']);
    Route::get('admin/coupon/status/{status}/{id}', [CouponController::class,'status']);

    Route::get('admin/size',[SizeController::class,'index']);
    Route::get('admin/size/manage_size',[SizeController::class,'manage_size']);
    Route::get('admin/size/manage_size/{id}',[SizeController::class,'manage_size']);
    Route::post('admin/size/manage_size_process', [SizeController::class,'manage_size_process'])
        ->name('size.manage_size_process');
    Route::get('admin/size/delete/{id}', [SizeController::class,'delete']);
    Route::get('admin/size/status/{status}/{id}', [SizeController::class,'status']);

    Route::get('admin/color',[ColorController::class,'index']);
    Route::get('admin/color/manage_color',[ColorController::class,'manage_color']);
    Route::get('admin/color/manage_color/{id}',[ColorController::class,'manage_color']);
    Route::post('admin/color/manage_color_process', [ColorController::class,'manage_color_process'])
        ->name('color.manage_color_process');
    Route::get('admin/color/delete/{id}', [ColorController::class,'delete']);
    Route::get('admin/color/status/{status}/{id}', [ColorController::class,'status']);

    Route::get('admin/product',[ProductController::class,'index']);
    Route::get('admin/product/manage_product',[ProductController::class,'manage_product']);
    Route::get('admin/product/manage_product/{id}',[ProductController::class,'manage_product']);
    Route::post('admin/product/manage_product_process', [ProductController::class,'manage_product_process'])
        ->name('product.manage_product_process');
    Route::get('admin/product/delete/{id}', [ProductController::class,'delete']);
    Route::get('admin/product/status/{status}/{id}', [ProductController::class,'status']);


});

//Route::get('admin/cp',[AdminController::class,'updatepassword']); //hashing pass
