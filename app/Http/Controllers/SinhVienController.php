<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    function thongTinSV(){
        $sinhvien=[
            [
                "id" => 1,
                "name" => "Nguyễn Văn Tú",
                "age" => 20,
                "address" => "Hưng Yên",
                "email" => "tunvph41491"
            ],
            [
                "id" => 2,
                "name" => "Hà Duy Tình",
                "age" => 20,
                "address" => "Nam Định",
                "email" => "tinhhdph41491"
            ],
            [
                "id" => 3,
                "name" => "Hoàng Lý Hải",
                "age" => 22,
                "address" => "Hưng Yên",
                "email" => "haihlph41491"
            ]
            ];
            return view("danh-sach-sinh-vien", compact("sinhvien"));
    }
}
