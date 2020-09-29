<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;


use App\User;


class UserController extends Controller
{
    public function getList()
    {
    	$user = User::all();
    	return view('admin.user.list', ['user'=>$user]);
    }

    public function add()
    {
    	return view('admin.user.add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'full_name' => 'required|min:3',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:3|max:32',
                'passwordAgain'=>'required|same:password',
                'id_card_number'=>'max:12|min:9', 
                'phone_number'=>'max:12'      
            ],
            [
                'full_name.required'=>'You have not entered Full Name.',
                'full_name.min'=>'Full Name is 3 or more in length.',
                'email.required'=>'You did not enter an Email.',
                'email.email'=>'You have not entered the correct Email format.',
                'email.unique'=>'Email already exists.',
                'password.required'=>'You did not enter an Password',
                'password.min'=>'Password is from 3 -> 32 characters long.',
                'password.max'=>'Password is from 3 -> 32 characters long.',
                'passwordAgain.required'=>'You have not entered the Password again.',
                'passwordAgain.same'=>'Retype Password does not match.',
                'id_card_number.max'=>'ID_Card_Number has a length of 9 -> 12 number.',
                'id_card_number.min'=>'ID_Card_Number has a length of 9 -> 12 number.',
                'phone_number'=>'Phone Number is less than 12 number long.'
            ]
        );

        $user = new User;
        $user->Full_Name = $request->full_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->Level = $request->level;
        $user->ID_Card_Number = $request->id_card_number;
        $user->Phone_Number = $request->phone_number;
        $user->Birthday = $request->birthday;
        $user->Address = $request->address;
       

        $user->save();

        return redirect('admin/user/add')->with('notification','Success Add');
    }

  
    public function getDelete($id)
    {
        
        User::where('id', $id)->delete();
        
        return redirect('admin/user/list')->with('notification','Success Delete ID: '.$id.' ');
    }

    public function getEdit($id)
    {
        $user = User::find($id);

        return view('admin.user.edit', ['user'=>$user]);
    }

    public function postEdit(Request $request,$id)
    {
    	$this->validate($request,
            [
                'full_name' => 'required|min:3',
                'id_card_number'=>'max:12|min:9', 
                'phone_number'=>'max:12'  
            ],
            [
                'full_name.required'=>'You have not entered Full Name.',
                'full_name.min'=>'Full Name is 3 or more in length.',
                'id_card_number.max'=>'ID_Card_Number has a length of 9 -> 12 number.',
                'id_card_number.min'=>'ID_Card_Number has a length of 9 -> 12 number.',
                'phone_number'=>'Phone Number is less than 12 number long.'
            ]
        );
     
      
     


		User::where('id', $id)->update(['Full_Name' => $request->full_name, 
										'Level' => $request->level,
										'ID_Card_Number' => $request->id_card_number,
										'Phone_Number' => $request->phone_number,
										'Birthday' => $request->birthday,
										'Address' => $request->address
										]);

		if ($request->changePassword == "on") {
            $this->validate($request,
            [
                'password'=>'required|min:3|max:32',
                'passwordAgain'=>'required|same:password'        
            ],
            [
                'password.required'=>'You did not enter an Password',
                'password.min'=>'Password is from 3 -> 32 characters long.',
                'password.max'=>'Password is from 3 -> 32 characters long.',
                'passwordAgain.required'=>'You have not entered the Password again.',
                'passwordAgain.same'=>'Retype Password does not match.'
            ]
        );
        User::where('id', $id)->update(['password' => bcrypt($request->password)]);
        }

        return redirect('admin/user/edit/'.$id)->with('notification', 'Success Edit Email: '.$request->email);
    }


    public function postLogin(Request $request)
    {
        $this->validate($request,
            [
                'emailLogin'=>'required|email|min:6|max:30',
                'passwordLogin'=>'required|min:6|max:100'       
            ],
            [
                'emailLogin.required'=>'Bạn chưa nhập Email.',
                'emailLogin.email'=>'Bạn chưa nhập đúng định dạng Email.',
                'emailLogin.min'=>'Độ dài Email phải ít nhất là 6 ký tự.',
                'emailLogin.max'=>'Độ dài Email không được quá 30 ký tự.',
                'passwordLogin.required'=>'Bạn phải nhập Password.',
                'passwordLogin.min'=>'Độ dài Password phải ít nhất là 8 ký tự.',
                'passwordLogin.max'=>'Độ dài Password không được quá 100 ký tự.'
            ]
        );

        if(Auth::attempt(['email'=>$request->emailLogin,'password'=>$request->passwordLogin, 'Level'=>'0']))
        {
            return view('pages.logoUser');
        }
        else if (Auth::attempt(['email'=>$request->emailLogin,'password'=>$request->passwordLogin, 'Level'=>'1'])){
            return "admin";
        }
        else {
            return "failed";
        }  
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('home');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request,
        [
            'nameRegister' => 'required|min:3|max:50',
            'emailRegister' => 'required|email|min:6|max:30|unique:users,email', 
            'passwordRegister' => 'required|min:6|max:100',
            'passwordConfirmRegister'=>'required|same:passwordRegister|min:6|max:100'
        ],
        [
            'nameRegister.required'=>'Bạn chưa nhập Tên.',
            'nameRegister.min'=>'Độ dài kí tự phải trên 3.',
            'nameRegister.max'=>'Độ dài kí tự không quá 50',
            'emailRegister.required'=>'Bạn chưa nhập Email.',
            'emailRegister.email'=>'Bạn chưa nhập đúng định dạng Email.',
            'emailRegister.unique'=>'Email đã tồn tại.',
            'emailRegister.min'=>'Độ dài Email phải ít nhất là 6 ký tự.',
            'emailRegister.max'=>'Độ dài Email không được quá 30 ký tự.',
            'passwordRegister.required'=>'Bạn chưa nhập Password.',
            'passwordRegister.min'=>'Độ dài Password phải ít nhất là 6 ký tự.',
            'passwordRegister.max'=>'Độ dài Password không được quá 100 ký tự.',
            'passwordConfirmRegister.required'=>'Bạn chưa nhập xác nhận Password.',
            'passwordConfirmRegister.same'=>'Bạn nhập xác nhận Password không trùng với Password.',
            'passwordConfirmRegister.min'=>'Độ dài xác nhận Password phải ít nhất là 6 ký tự.',
            'passwordConfirmRegister.max'=>'Độ dài xác nhận Password không được quá 100 ký tự.',
        ]
        );
        
        if ($request->ajax()) {

            $id =  User::insert([
                'Full_Name'     => $request->nameRegister,
                'email'    => $request->emailRegister,
                'password' => Hash::make($request->passwordRegister),
                'Level' => 0,
            ]);
        }

        if(Auth::attempt(['email'=>$request->emailRegister,'password'=>$request->passwordRegister, 'Level'=>'0']))
        {
            return view('pages.logoUser');
        }
    }


}
