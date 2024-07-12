<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SinhVienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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



