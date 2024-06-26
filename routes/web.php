<?php

use App\Http\Controllers\SinhVienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// GET & POST => method HTTP
Route::get('/', function(){
    echo "Trang chủ";
});

Route::get('/list-user',[UserController::class,"showUser"]);

Route::get('/list-student',[SinhVienController::class,"thongTinSV"]);

//Params
// http://127.0.0.1:8000/update-user?id=1&name=Vantu
Route::get('/update-user',[UserController::class,"updateUser"]);


// Slug
// http://127.0.0.1:8000/list-user/1 or http://127.0.0.1:8000/list-user/Anhtu
Route::get('/list-user/{id}/{name?}',[UserController::class,"getUser"]);



