<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

    public function getLoginAdmin()
    {
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request)
    {
        $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required|min:3|max:32'       
            ],
            [
                'email.required'=>'Ban chua nhap email',
                'password.required'=>'Ban chua nhap password',
                'password.min'=>'password co do dai tu 3 -> 32 ki tu',
                'password.max'=>'password co do dai tu 3 -> 32 ki tu'
            ]
        );

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
        {
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password, 'Level'=>'1'])){
                return redirect('admin/user/list');
            }
            else{
                return redirect('home');
            }
        }
        else
        {
            return redirect('admin/login')->with('loi','Vui Lòng Nhập Lại');
        }  
    }

    public function getLogoutAdmin()
    {
        Auth::logout();
        return redirect('admin/login');
    }


}
