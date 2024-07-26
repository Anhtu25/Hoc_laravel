<?php

// use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthenticationController;

Route::get('login',[AuthenticationController::class,'login'])->name('login');
Route::post('login',[AuthenticationController::class,'postLogin'])->name('postLogin');
Route::get('logout',[AuthenticationController::class,'logout'])->name('logout');
Route::get('register',[AuthenticationController::class,'register'])->name('register');
Route::post('post-register',[AuthenticationController::class,'postRegister'])->name('postRegister');

// GET & POST => method HTTP
Route::get('/', function(){
    echo "Trang chủ";
});
Route::get('/admin',[UserController::class,"test"]);
// Route::get('/list-user',[UserController::class,"showUser"]);

// Route::get('/list-student',[SinhVienController::class,"thongTinSV"]);

Route::group(['prefix'=> 'products', 'as'=>'products.'], function(){
    Route::get('list-product',[ProductController::class,"listProducts"])->name('listProducts');
    Route::get('add-products',[ProductController::class,"addProducts"])->name('addProducts');
    Route::post('add-products',[ProductController::class,"storeProducts"])->name("storeProducts");
    Route::get('edit-products/{id}',[ProductController::class,"editProducts"])->name("editProducts");
    Route::post('edit-products/{id}',[ProductController::class,"updateProducts"])->name('updateProducts');
    route::get('del-products/{id}',[ProductController::class,"delProducts"])->name('delProducts');
    Route::get('/products/search', [ProductController::class, 'search'])->name('search');


});

Route::group(['prefix'=> 'users', 'as'=>'users.'], function(){
    Route::get('list-user', [UserController::class,"listUser"])->name('listUser');
    Route::get('add-users',[UserController::class,"addUsers"])->name('addUsers');
    Route::post('add-users',[UserController::class,"storeUsers"])->name("storeUsers");
    Route::get('update-users/{id}',[UserController::class,"editUsers"])->name('editUsers');

    route::get('del-users/{id}',[UserController::class,"delUsers"])->name('delUsers');
});

//Params
// http://127.0.0.1:8000/update-user?id=1&name=Vantu
Route::get('/update-user',[UserController::class,"updateUser"]);


// // Slug
// // http://127.0.0.1:8000/list-user/1 or http://127.0.0.1:8000/list-user/Anhtu
// Route::get('/list-user/{id}/{name?}',[UserController::class,"getUser"]);



Route::group(['prefix'=>'admin', 'as'=>'admin.', 'middleware'=>'checkAdmin'], function(){
    Route::group(['prefix'=>'products', 'as'=>'products.'], function(){
        Route::get('/',[ProductController::class,'listProducts'])->name('listProducts');
        Route::get('add-product',[ProductController::class,'addProducts'])->name('addProducts');
        Route::post('add-product',[ProductController::class,'addPostProducts'])->name('addPostProducts');
        Route::delete('delete-product',[ProductController::class,'deleteProduct'])->name('deleteProduct');
    });
});

