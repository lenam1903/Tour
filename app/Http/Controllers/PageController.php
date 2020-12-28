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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;
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

    public function postCheckOutInfo(Request $request, $idTour, $idUser)
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
        
        if ($request->value == "") {
            $searchTour = DB::table('tour')->get();
            return view('pages.search', ['searchTour' => $searchTour]);
        } else {
            $searchTour = DB::table('tour')->where([

                ['Tour_Name', 'LIKE', '%' . $request->value . '%']

            ])->orWhere([

                ['Price', 'LIKE', '%' . $request->value . '%']

            ])->orWhere([

                ['Describe', 'LIKE', '%' . $request->value . '%']

            ])
                ->orWhere([

                    ['Departure_Day', 'LIKE', '%' . $request->value . '%']

                ])
                ->orWhere([

                    ['Number_Of_Seats_Available', 'LIKE', '%' . $request->value . '%']

                ])
                ->orWhere([

                    ['Rate', 'LIKE', '%' . $request->value . '%']

                ])->get();


            return view('pages.search', ['searchTour' => $searchTour]);
        }
    }

    public function bill(Request $request)
    {

        return view('pages.bill');
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
        
    
}
