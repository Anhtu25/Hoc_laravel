<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function showUser(){
        $user = [
            [
                'id' => 1,
                'name' => 'John'
            ],
            [
                'id' => 2,
                'name' => 'Anhtu'
            ],
            [
                'id' => 3,
                'name' => 'VanTu'
            ]

        ];
        return view('list-user', compact("user"));
    }
    function getUser($id, $name=''){
        echo $id." ".$name ;
    }
    function updateUser(Request $request){
        echo $request->id."  ";
        echo $request->name;
    }
}
