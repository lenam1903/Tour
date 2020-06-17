<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Directory;
use App\Places;
use App\User;
use App\Tour;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; 

class PageController extends Controller
{
    function home()
    {
    	return view('pages.home');
    }

    function contact()
    {
    	return view('pages.contact');
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

    public function CheckOutInfo( $id){
		$idTour = Tour::find($id);
    	return view('pages.check-out-info',['idTour'=>$idTour]);
	}

    public function postCheckOutInfo(Request $request, $id){
        if ($request->ajax()) {

         

           

            return response()->json($request->email);
        }
    }
    
    public function adultAjax(Request $request){
       
        if (isset($_GET['adult']) && isset($_GET['guestNumberMax']) && isset($_GET['guestNumber'])) {
            $adult = $_GET['adult'];
            $guestNumberMax = $_GET['guestNumberMax'];
            $guestNumber = $_GET['guestNumber'];

            // if ($guestNumber <= $guestNumberMax && $guestNumber >= 0) {
            //     return view('pages.contact');
            // }


            return response()->json($guestNumber);
        }
	}

}
