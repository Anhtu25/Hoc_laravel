<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\registerArgumentsSet;

class UserController extends Controller
{
    public function listUser()
    {
        $listUsers = DB::table('users')
            ->join('phongban', 'phongban.id', '=', 'users.phongban_id')
            ->select('users.id', 'users.name', 'users.email', 'users.tuoi', 'users.phongban_id', 'phongban.ten_donvi')
            ->get();
        return view('users/listUsers', compact("listUsers"));
    }
    public function addUsers()
    {
        $phongban = DB::table('phongban')->select('id','ten_donvi')->get();
        return view('users/addUsers', compact("phongban"));
    }
    public function storeUsers(Request $req){
        $data = [
            'name' => $req->nameUser,
            'email' => $req->emailUser,
            'phongban_id' => $req->phongbanUser,
            'tuoi' => $req->tuoiUser,
            'created_at' => Carbon::now(),
            'updated_at' =>Carbon::now(),
        ];
        DB::table('users')->insert($data);
        return redirect()->route('users.listUser');
    }
    
    public function editUsers($idUser){
        $phongban = DB::table('phongban')->select('id','ten_donvi')->get();
        return view('users/addUsers', compact("phongban"));
    }
    public function updateUser(Request $req, $idUser){
        $data = [
            'name' => $req->nameUser,
            'email' => $req->emailUser,
            'phongban_id' => $req->phongbanUser,
            'tuoi' => $req->tuoiUser,
            'created_at' => Carbon::now(),
            'updated_at' =>Carbon::now(),
        ];
        DB::table('users')
        ->where('id', $idUser)
        ->update($data);
        return redirect()->route('users.listUser');
    }
    public function delUsers($idUser){
        DB::table('users')
        ->where('id', $idUser)
        ->delete();
        return redirect()->route('users.listUser');
    }

    // function showUser()
    // {
    //     //1. Lấy danh sách toàn bộ user (select * form users)
    //     // $listUsers = DB::table('users')->get();
    //     // dd($listUsers);

    //     //2. Lấy thông tin user có id = 4 (select * from users where id = 4)
    //     // $result = DB::table('users')->where('id','=','4')->first();
    //     // $result = DB::table('users')->find('4');//Chỉ dùng với id
    //     // dd($result);

    //     //3. Lấy thuộc tính 'name' của user có id = 16
    //     // $result = DB::table('users')->where('id','=','16')->value('name');
    //     // dd($result);

    //     //Lấy danh sách idUser của phòng ban 'Ban giám hiệu'
    //     // $idPhongban = DB::table('phongban')
    //     //     ->where('ten_donvi', 'like', "%Ban giám hiệu%")
    //     //     ->value('id');
    //     // $result = DB::table("users")->where('phongban_id', $idPhongban)->pluck('id');
    //     // dd($result);

    //     //5. Tìm user có độ tuổi lớn nhất trong công ty
    //     // $result = DB::table('users')->where('tuoi', DB::table('users')->max('tuoi'))->get();
    //     // dd($result);

    //     //6. Tìm user có độ tuổi nhỏ nhất trong công ty
    //     // $result = DB::table('users')->where('tuoi', DB::table('users')->min('tuoi'))->get();
    //     // dd($result);

    //     //7. Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user
    //     // $idPhongban = DB::table('phongban')
    //     //     ->where('ten_donvi', 'like', "%Ban giám hiệu%")
    //     //     ->value('id');
    //     // $result = DB::table("users")->where('phongban_id', $idPhongban)->get();
    //     // dd($result);

    //     //8. Lấy danh sách tuổi các user 
    //     // $result=DB::table('users')->distinct()->pluck('tuoi');
    //     // dd($result);

    //     //9. Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
    //     // $result = DB::table('users')->where('name','like','%Khải')
    //     //                             ->orWhere('name','like','%Thanh')
    //     //                             ->get();
    //     // dd($result);

    //     //10. Lấy danh sách user ở phòng ban 'Ban đào tạo'
    //     // $idPhongban = DB::table('phongban')
    //     //     ->where('ten_donvi', 'like', "%Ban đào tạo%")
    //     //     ->value('id');
    //     // $result = DB::table("users")
    //     // ->where('phongban_id', $idPhongban)
    //     // ->select('id','name','email')
    //     // ->get();
    //     // dd($result);

    //     //11. Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần

    //     // $result = DB::table('users')
    //     // ->where('tuoi','>=','30')
    //     // ->orderBy('tuoi','asc')
    //     // ->get();
    //     // dd($result);

    //     //12. Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
    //     // $result = DB::table('users')
    //     // ->orderBy('tuoi','desc')
    //     // ->offset(5) //or skip
    //     // ->limit(10) // or take
    //     // ->get();
    //     // dd($result);

    //     //13. Thêm một user mới vào công ty
    //     // $data=[
    //     //     'name'=>"Văn Tú",
    //     //     'email'=>"anhtu2651@gmail.com",
    //     //     'phongban_id'=>"1",
    //     //     'songaynghi'=>'0',
    //     //     'tuoi'=>'20',
    //     //     'created_at' =>Carbon::now(),
    //     //     'updated_at' =>Carbon::now()
    //     // ];
    //     // DB::table('users')->insert($data);

    //     //14. Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo'
    //     //     $idPhongban = DB::table('phongban')
    //     //         ->where('ten_donvi', 'like', "%Ban đào tạo%")
    //     //         ->value('id');
    //     //     $result = DB::table("users")
    //     //         ->where('phongban_id', $idPhongban)
    //     //         ->select('id','name','email')
    //     //         ->get();
    //     //     foreach($result as $value){
    //     //         DB::table('users')->where('id',$value->id)->update(['name'=>$value->name. ' PĐT']);
    //     //     }

    //     //     //15. Xóa user nghỉ quá 15 ngày
    //     //     DB::table('users')->where('songaynghi','>','15')->delete();
    //     // }

    //     // // function getUser($id, $name=''){
    //     // //     echo $id." ".$name ;
    //     // // }
    //     // function updateUser(Request $request){
    //     //     echo $request->id."  ";
    //     //     echo $request->name;
    //     // }
    // }
}
