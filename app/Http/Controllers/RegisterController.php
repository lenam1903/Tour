<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('test');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email', 
            'password' => 'required',
        ],
        [
            'name.required'=>'Bạn chưa nhập Tên.',
            'name.min'=>'Độ dài kí tự phải trên 3',
            'name.max'=>'Độ dài kí tự không quá 20',
            'email.unique'=>'Email đã tồn tại.',
            'password.required'=>'NHap Password '
        ]
        );
        if ($request->ajax()) {

            $id =  User::insertGetId([
                'Full_Name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json($request->name);
        }
    }
}