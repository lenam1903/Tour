<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Directory;
use App\Places;
use App\User;
use App\Tour;
use App\BillDetails;
use App\Bill;
use App\Comment;
use App\thongke;
use App\lich_su_nap_tien;
use App\Check_tranid;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use App\Cart;
use Illuminate\Pagination\Paginator;


class PageController extends Controller
{


    function home(Request $request)
    {
        Paginator::useBootstrap();
        $tourPaginate = Tour::paginate(3);

        return view('pages.home', ['tourPaginate' => $tourPaginate]);
    }


    function listCart()
    {
        return view('pages.list-cart');
    }

    function detailTour($id)
    {
        $idTour = Tour::find($id);
        DB::table('tour')->where('ID', $id)->update(['views' => $idTour->views + 1]);

        return view('pages.detailTour', ['idTour' => $idTour]);
    }

    function contact()
    {
        return view('pages.contact');
    }

    public function checkOut($id)
    {
        $idTour = Tour::find($id);
        return view('pages.checkOut', ['idTour' => $idTour]);
    }

    public function postCheckOutInfo(Request $request, $idTour, $idUser, $balance)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $this->validate(
            $request,
            [
                'fullName' => 'required|min:3|max:50',
                'email' => 'required|email',
                'number' => 'required|min:5|max:13',
                'address' => 'required|max:100',
                'note' => 'max:100',


            ],
            [
                'fullName.required' => 'Bạn chưa nhập Tên.',
                'fullName.min' => 'Độ dài kí tự phải trên 3',
                'fullName.max' => 'Độ dài kí tự không quá 50',
                'email.required' => 'Bạn chưa nhập Email.',
                'email.email' => 'Không đúng kiểu Email.',
                'number.required' => 'Bạn chưa nhập số điện thoại.',
                'number.min' => 'Độ dài kí tự phải trên 5',
                'number.max' => 'Độ dài kí tự không quá 13',
                'address.max' => 'Độ dài kí tự không quá 100',
                'address.required' => 'Bạn chưa nhập địa chỉ.',
                'note.max' => 'Độ dài kí tự không quá 100',

            ]
        );

        if ($request->ajax()) {
            $id =  Bill::insertGetId([
                'ID_Tour'     => $idTour,
                'ID_Users'    => $idUser,
                'Bill_Code' => substr(md5(rand()), 0, 10),
                'Full_Name'     => $request->fullName,
                'Email'     => $request->email,
                'Phone_Number'     => $request->number,
                'Address'     => $request->address,
                'Guest_Number'     => $request->guestNumber,
                'Noted'     => $request->note,
                'Payments'     => $request->payments,
                'Voucher'     => $request->voucher,
                'Date_Of_Payment'     => date("Y-m-d H:i:s"),
                'Total_Price'     => $request->totalPrice,
                'soDu' => $request->sodu,
            ]);

            for ($i = 1; $i <= $request->adult; $i++) {
                if (isset($_POST["Adult$i"])) {

                    $dataAdult = [

                        [
                            'Full_Name' => $_POST["Adult$i"]['0'],
                            'ID_Bill' => $id,
                            'Gender' => $_POST["Adult$i"]['1'],
                            'Age' => $_POST["Adult$i"]['2'],
                            'Date_Of_Birth' => $_POST["Adult$i"]['3'],
                            'Single_Room' => $_POST["Adult$i"]['4'],
                            'Price' => $_POST["Adult$i"]['5'],
                        ],
                        //...
                    ];
                    DB::table('bill_details')->insert($dataAdult);
                }
            }

            for ($i = 1; $i <= $request->children; $i++) {
                if (isset($_POST["Children$i"])) {

                    $dataChildren = [

                        [
                            'Full_Name' => $_POST["Children$i"]['0'],
                            'ID_Bill' => $id,
                            'Gender' => $_POST["Children$i"]['1'],
                            'Age' => $_POST["Children$i"]['2'],
                            'Date_Of_Birth' => $_POST["Children$i"]['3'],
                            'Single_Room' => $_POST["Children$i"]['4'],
                            'Price' => $_POST["Children$i"]['5'],
                        ],
                        //...
                    ];
                    DB::table('bill_details')->insert($dataChildren);
                }
            }

            for ($i = 1; $i <= $request->baby; $i++) {
                if (isset($_POST["Baby$i"])) {

                    $dataBaby = [

                        [
                            'Full_Name' => $_POST["Baby$i"]['0'],
                            'ID_Bill' => $id,
                            'Gender' => $_POST["Baby$i"]['1'],
                            'Age' => $_POST["Baby$i"]['2'],
                            'Date_Of_Birth' => $_POST["Baby$i"]['3'],
                            'Single_Room' => $_POST["Baby$i"]['4'],
                            'Price' => $_POST["Baby$i"]['5'],
                        ],
                        //...
                    ];
                    DB::table('bill_details')->insert($dataBaby);
                }
            }

            DB::table('users')->where('ID', $idUser)->update([
                'balance'    =>    $balance - $request->totalPrice
            ]);

            $tk = thongke::where('date',date('Y-m-d'))->first();
            if(!is_null($tk))
            {
                DB::table('thongke')
                ->where(
                            'date',date('Y-m-d')
                            )
                ->update([
                'soluong' => $tk->soluong+1,
                'tongtien' => $tk->tongtien+$request->totalPrice,
    
                    ]);
            }
            else{
            $tk = new thongke();

            $tk->soluong = 1;
            $tk->date = date('Y-m-d');
            $tk->tongtien = $request->totalPrice;
            $tk->save();
            } 
    
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->DeleteItemCart($idTour);

            if (count($newCart->products) > 0) {
                $request->Session()->put('Cart', $newCart);
            } else {
                $request->Session()->forget('Cart');
            }

            return view('pages.cart');
        }
    }

    public function adultAjax(Request $request, $id)
    {
        $idTour = Tour::find($id);


        if (isset($_GET['adult']) && isset($_GET['guestNumberMax']) && isset($_GET['guestNumber'])) {
            $adult = $_GET['adult'];
            $guestNumberMax = $_GET['guestNumberMax'];
            $guestNumber = $_GET['guestNumber'];

            if ($adult == "") {
                return "";
            }

            if ($guestNumberMax < $guestNumber) {
                return "";
            } else {
                if ($adult == 0) {
                    return "";
                } else {
                    return view('pages.formAdult', ['idTour' => $idTour, 'adult' => $adult]);
                }
            }
        }
    }

    public function childrenAjax(Request $request, $id)
    {
        $idTour = Tour::find($id);

        if (isset($_GET['children']) && isset($_GET['guestNumberMax']) && isset($_GET['guestNumber'])) {
            $children = $_GET['children'];
            $guestNumberMax = $_GET['guestNumberMax'];
            $guestNumber = $_GET['guestNumber'];

            if ($children == "") {
                return "";
            }

            if ($guestNumberMax < $guestNumber) {
                return "";
            } else {
                return view('pages.formChildren', ['idTour' => $idTour, 'children' => $children]);
            }
        }
    }

    public function babyAjax(Request $request, $id)
    {
        $idTour = Tour::find($id);

        if (isset($_GET['baby']) && isset($_GET['guestNumberMax']) && isset($_GET['guestNumber'])) {
            $baby = $_GET['baby'];
            $guestNumberMax = $_GET['guestNumberMax'];
            $guestNumber = $_GET['guestNumber'];

            if ($baby == "") {
                return "";
            }

            if ($guestNumberMax < $guestNumber) {
                return "";
            } else {
                return view('pages.formBaby', ['idTour' => $idTour, 'baby' => $baby]);
            }
        }
    }

    public function review(Request $request, $idTour, $idUser)
    {

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->validate(
            $request,
            [
                'content' => 'required|min:1|max:100',

            ],
            [
                'content.required' => 'Bạn chưa nhập Nội Dung.',
                'content.min' => 'Độ dài kí tự phải trên 1',
                'content.max' => 'Độ dài kí tự không quá 100',
            ]
        );

        $comment = new Comment;
        $comment->ID_Users = $idUser;
        $comment->ID_Tour = $idTour;
        $comment->Content = $request->content;
        $comment->Rate = $request->rate;
        $comment->save();

        $average = DB::table('comment')->where('ID_Tour', $idTour)->avg('Rate');

        DB::table('tour')->where('ID', $idTour)->update([
            'Rate'    =>    $average
        ]);

        $id = Tour::find($idTour);
        $comment1 = Comment::all();

        return view('pages.restStar', ['average' => $average, 'idTour' => $idTour, 'id' => $id, 'comment1' => $comment1]);
    }

    public function search(Request $request)
    {
        Paginator::useBootstrap();
        
   
        if ($request->valueSearch == "") {
            // $searchTour = DB::table('tour')->paginate(3);
            // return view('pages.search', ['searchTour' => $searchTour]);
        } else {
            $searchTour = DB::table('tour')->where([

                ['Tour_Name', 'LIKE', '%' . $request->valueSearch . '%']

            ])->orWhere([

                ['Price', 'LIKE', '%' . $request->valueSearch . '%']

            ])->orWhere([

                ['Describe', 'LIKE', '%' . $request->valueSearch . '%']

            ])
                ->orWhere([

                    ['Departure_Day', 'LIKE', '%' . $request->valueSearch . '%']

                ])
                ->orWhere([

                    ['Number_Of_Seats_Available', 'LIKE', '%' . $request->valueSearch . '%']

                ])
                ->orWhere([
                    ['Rate', 'LIKE', '%' . $request->valueSearch . '%']
                ])
                ->orWhere([
                    ['Tour_Code', 'LIKE', '%' . $request->valueSearch . '%']
                ])->paginate(3);

                $countPage = $searchTour->count();
            return view('pages.search', ['searchTour' => $searchTour, 'countPage' => $countPage, 'valueSearch' => $request->valueSearch]);
        }
    }

    public function thanhtoan()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        
        $data_send = [
            "key" => "80a1695c06d1cac8a31c958cf25c4934",
            "phone" => "0356094694",
            "limit" => 20 
           
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.gatepay.vn/api/momo/lichsugiaodich",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => json_encode($data_send),
            CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Accept" => "application/json"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        
        $data = json_decode($response,true);
        foreach($data['data'] as $lenam){

         
           
            $check_tranid_0 = DB::table('check_tranid')->where('tranid', $lenam['tranid'])->count();
            if($check_tranid_0 > 0 ){
                
            } else {
             
                $cmt = substr( $lenam['comment'],  0, 7);
                if($lenam['type'] == 1 && $cmt == 'NAPTIEN'){

                    $email_naptien =  strstr($lenam['comment'], ' ');
                    $length = strlen($email_naptien);
                    $email_naptien = substr( $email_naptien,  1, $length);
                    $amount = $lenam['amount'];
                    $partnerId = $lenam['partnerId'];
                    
                    

                    $length_email = strlen($email_naptien);
                    if($length_email > 0){
                        
                        $balance = DB::table('users')->where('email', $email_naptien)->count();
                        if($balance > 0){
                            $balance = DB::table('users')->where('email', $email_naptien)->get();
                            $balance =  json_decode($balance, true);
                            
                            $balance = $balance[0]['balance'];
                        
                            DB::table('users')->where('email', $email_naptien)->update(['balance' =>  $balance + $amount]);

                            $check_tranid_0 = DB::table('check_tranid')->where('tranid', $lenam['tranid'])->count();
                            if($check_tranid_0 > 0 ){
                                

                            } else {
                                $check_tranid = new Check_tranid();
                                $check_tranid->tranid = $lenam['tranid'];                    
                                $check_tranid->save();

                                $lich_su_nap_tien = new lich_su_nap_tien();
                                $lich_su_nap_tien->numberphone = $partnerId;
                                $lich_su_nap_tien->id_users = Auth::user()->id;
                                $lich_su_nap_tien->ID_naptien = $lenam['tranid'];
                                $lich_su_nap_tien->amount = $amount;                    
                                $lich_su_nap_tien->save();
                            }

                        } else {
                            
                        }
                    } else {
                        
                    }

                } else {
                    
                }

            }
        }


        return $check_tranid_0;
    }

    public function bill(Request $request)
    {

        return view('pages.bill');
    }

    public function napTien(Request $request)

    {
        if(Auth::check()){
            $sumAmount = DB::table('lich_su_nap_tien')->where('id_users', Auth::user()->id)->sum('amount');
        } else {
            return "vui lòng đăng nhập để xem";
        }

        return view('pages.napTien', ['sumAmount' => $sumAmount]) ;
    }

    public function places(Request $request)
    {

        if (isset($_GET['idPlaces'])) {
            $idPlaces = $_GET['idPlaces'];
        } else {
            $idPlaces = "";
        }
        
        Paginator::useBootstrap();
        
        $searchPlaces = DB::table('tour')->where([['ID_Place', $idPlaces]])->paginate(3);
        // echo $currentPage = $searchPlaces->currentPage();
        $countPage = $searchPlaces->count();

        return view('pages.searchPlaces', ['searchPlaces' => $searchPlaces, 'idPlaces' => $idPlaces, 'countPage' => $countPage]);
    }


    public function searchMaxMin(Request $request)
    {
        Paginator::useBootstrap();
        $GLOBALS['idPlaces'] = $request->idPlaces;
        $GLOBALS['order'] = $request->order;
        $GLOBALS['search'] = $request->search;
        if(isset($request->rate)){
            $GLOBALS['rate'] = $request->rate;
        } else {
            $GLOBALS['rate'] = "";
        }
        
        if($request->order == 'desc' || $request->order == 'asc') {
            
            $searchPlaces = DB::table('tour')->where(function ($query) {
                if($GLOBALS['rate'] >= 1 && $GLOBALS['rate'] <= 5){
                    $query->where([['ID_Place', $GLOBALS['idPlaces']], ['Rate', '<=', $GLOBALS['rate']]]);
                } else {
                    $query->where([['ID_Place', $GLOBALS['idPlaces']]]);
                }
               
            })->where(function ($query) {
                if(isset($GLOBALS['search'])){
                    $query->where([

                        ['Tour_Name', 'LIKE', '%' . $GLOBALS['search'] . '%']
        
                    ])->orWhere([

                        ['Price', 'LIKE', '%' . $GLOBALS['search'] . '%']
        
                    ])->orWhere([
        
                        ['Describe', 'LIKE', '%' .$GLOBALS['search'] . '%']
        
                    ])
                        ->orWhere([
        
                            ['Departure_Day', 'LIKE', '%' . $GLOBALS['search'] . '%']
        
                        ])
                        ->orWhere([
        
                            ['Number_Of_Seats_Available', 'LIKE', '%' . $GLOBALS['search'] . '%']
        
                        ])
                        ->orWhere([
        
                            ['Tour_Code', 'LIKE', '%' . $GLOBALS['search'] . '%']
        
                        ])->get();
                } else {
                    $query->where([['ID_Place', $GLOBALS['idPlaces']]]);
                }
               
            })
            ->orderBy('Price', $GLOBALS['order'])->paginate(3);
            $countPage = $searchPlaces->count();

            return view('pages.searchMaxMin', ['searchPlaces' => $searchPlaces, 'idPlaces' => $request->idPlaces, 'countPage' => $countPage, 'order' => $request->order, 'rate' => $request->rate, 'search' => $GLOBALS['search']]);

        } else {
            
            $searchPlaces = DB::table('tour')->where(function ($query) {
                if($GLOBALS['rate'] >= 1 && $GLOBALS['rate'] <= 5){
                    $query->where([['ID_Place', $GLOBALS['idPlaces']], ['Rate', '<=', $GLOBALS['rate']]]);
                } else {
                    $query->where([['ID_Place', $GLOBALS['idPlaces']]]);
                }
               
            })->paginate(3);
            $countPage = $searchPlaces->count();
            
            return view('pages.searchMaxMin', ['searchPlaces' => $searchPlaces, 'idPlaces' => $request->idPlaces, 'countPage' => $countPage, 'order' => '', 'rate' => $request->rate]);
        }
    }

    public function thongke(){
        return  view('pages.thongke');
    }
    

    public function filter_by_date(Request $req)
    {

        $from_date = $req->from_date;
        $to_date = $req->to_date;

        $sub365ngay = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        if($from_date == null)
        {
            $get = thongke::whereBetween('date',[$sub365ngay,$to_date])->orderBy('date','ASC')->get();
        }
        elseif ($to_date == null)
        {
            $get = thongke::whereBetween('date',[$from_date,$now])->orderBy('date','ASC')->get();
        }
        else{
        $get = thongke::whereBetween('date',[$from_date,$to_date])->orderBy('date','ASC')->get();
        }
        foreach($get as $key => $val)
        {
            $chart_data[] = array(
                'preiod' => $val->date,
                'profit' => $val->tongtien,
                'quantify' => $val->soluong

            );
        }

        echo $data = json_encode($chart_data);
    }

    public function chart30days(Request $req)
    {
        $data = $req->all();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $get = thongke::whereBetween('date',[$dauthangnay,$now])->orderBy('date','ASC')->get();

        foreach($get as $key => $val)
        {
            $chart_data[] = array(
                'preiod' => $val->date,
               
                'profit' => $val->tongtien,
                'quantify' => $val->soluong

            );
        }

        echo $data = json_encode($chart_data);
    }

    public function dasboard_filter(Request $req)
    {
        $data = $req->all();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc = Carbon::now('Asia/Ho_chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7ngay = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365ngay = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $get1 = ThongKe::whereBetween('date',[$dauthangnay,$now])->orderBy('date','ASC')->get();

        if($data['dasboard_value'] == '7ngay')
        {
            $get = ThongKe::whereBetween('date',[$sub7ngay,$now])->orderBy('date','ASC')->get();
        }
        elseif($data['dasboard_value'] == 'thangtruoc')
        {
            $get = ThongKe::whereBetween('date',[$dauthangtruoc,$cuoithangtruoc])->orderBy('date','ASC')->get();
        }

        elseif($data['dasboard_value'] == 'thangnay')
        {
            $get = ThongKe::whereBetween('date',[$dauthangnay,$now])->orderBy('date','ASC')->get();
        }
        else{
            $get = ThongKe::whereBetween('date',[$sub365ngay,$now])->orderBy('date','ASC')->get();
        }

        
        
            
        foreach($get as $key => $val)
        {
            
            $chart_data[] = array(
                'preiod' => $val->date,
              
                'profit' => $val->tongtien,
                'quantify' => $val->soluong

            );
        
        }
    
        echo $data = json_encode($chart_data);
    }

    public function hoaDonFull(){
        return view('pages.hoa_don_full');
    }

    public function get_edit_users($id){
        $user = User::find($id);
        return view('pages.edit_users', ['user'=>$user]);
    }

    public function post_edit_users(Request $request,$id){
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

        return redirect('edit-users/'.$id)->with('notification', 'Success Edit Email: '.$request->email);
    
    }

  
}
