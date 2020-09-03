<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Tour;
use App\Directory;
use DB;


class TourController extends Controller
{
    public function getList()
    {
    	return view('admin.tour.list');
    }

    public function add()
    {
        $directory1 = Directory::all()->first();
    
    	return view('admin.tour.add', ['directory1'=>$directory1]);
    }

    public function getDelete($id)
    {
        
        Tour::where('ID', $id)->delete();
        
        return redirect('admin/tour/list')->with('notification','Success Delete ID: '.$id.' ');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'tour' => 'required|min:3|max:225|unique:tour,Tour_Name',
                'transportation' => 'required',
                'tour_time' => 'required',
                'place_of_departure' => 'required',
                'departure_day' => 'required',
                'describe' => 'required',
                'number_of_seats_available' => 'required',
                'image' => 'required',
                'price' => 'required',
                'tour_code' => 'required',
                'iddirectory' => 'required',
                'idplaces' => 'required'
            ],
            [
                'tour_code.required'=>'Chưa nhập Mã Tour',
                'tour.required'=>'Bạn chưa nhập Tên Tour',
                'tour.min'=>'Độ dài kí tự phải trên 3',
                'tour.unique'=>'Tên Tour đã tồn tại.',
                'tour.max'=>'Độ dài kí tự không quá 225',
                'iddirectory.required'=>'Chưa nhập Danh Mục',
                'idplaces.required'=>'Chưa nhập Địa Điểm',
                'tour_time.required'=>'Chưa chọn thời gian tour',
                'transportation.required'=>'Chưa chọn Phương Tiện',
                'describe.required'=>'Chưa nhập Mô Tả',
                'place_of_departure.required'=>'Chưa chọn Nơi khởi hành',
                'departure_day.required'=>'Chưa Nhập Ngày KHởi Hành',
                'number_of_seats_available.required'=>'Chưa nhập số chỗ còn trống',
                'image.required'=>'Chưa chọn Ảnh',
                'price.required'=>'Chưa nhập giá tiền',
                
            ]
        );
        $transportation="";
        $tour_time="";

        $tour = new Tour;
        $tour->Tour_Code = $request->tour_code;
        $tour->Tour_Name = $request->tour;
        $tour->Tour_Name_URL = changeTitle($request->tour);
        $tour->ID_Directory = $request->iddirectory;
        $tour->ID_Place = $request->idplaces;
        $tour->ID_Tag= $request->idtag;
        $tour->Place_Of_Departure= $request->place_of_departure;

        if (isset($_POST['transportation'])) {
            
            foreach($_POST['transportation'] as $v) {
                echo $v."<br/>";
                $transportation = $v."+". $transportation;
            }  
        }
        $tour->Transportation= $transportation;
        
        if (isset($_POST['tour_time'])) {
            foreach($_POST['tour_time'] as $v) {
                $tour_time = $tour_time." ". $v;
            } 
        }
        $tour->Tour_Time= $tour_time;
        $tour->Departure_Day= $request->departure_day;
        $tour->Describe= $request->describe;
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/tour/add')->with('notification','Bạn chỉ được chọn file image có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalExtension();
            $image = str_random(4)."_". $name;
            while (file_exists("upload/tour/".$image)) {
                $image = str_random(4)."_". $name;
            }
            $file->move("upload/tour",$image);
            $tour->Image = $image;
        }
        else
        {
            $tour->Image="";
        }

        $tour->Number_Of_Seats_Available= $request->number_of_seats_available;
        $tour->Price= $request->price;

        $tour->save();

        return redirect('admin/tour/add')->with('notification','Thêm Thành Công - ' .$request->tour.' ');
    }

    public function getEdit($id)
    {
        $tour = Tour::find($id);

        return view('admin.tour.edit', ['tour1'=>$tour]);
    }

    public function postEdit(Request $request, $id)
    {
        $tour = Tour::find($id);
        $this->validate($request,
            [
                'tour' => 'required|min:3|max:50',
                'transportation' => 'required',
                'tour_time' => 'required',
                'place_of_departure' => 'required',
                'departure_day' => 'required',
                'describe' => 'required',
                'number_of_seats_available' => 'required',
                'price' => 'required',
                'iddirectory' => 'required',
                'idplaces' => 'required'
            ],
            [
                'tour_code.required'=>'Chưa nhập Mã Tour',
                'tour.required'=>'Bạn chưa nhập Tên Tour',
                'tour.min'=>'Độ dài kí tự phải trên 3',
                'tour.max'=>'Độ dài kí tự không quá 50',
                'iddirectory.required'=>'Chưa nhập Danh Mục',
                'idplaces.required'=>'Chưa nhập Địa Điểm',
                'tour_time.required'=>'Chưa chọn thời gian tour',
                'transportation.required'=>'Chưa chọn Phương Tiện',
                'describe.required'=>'Chưa nhập Mô Tả',
                'place_of_departure.required'=>'Chưa chọn Nơi khởi hành',
                'departure_day.required'=>'Chưa Nhập Ngày KHởi Hành',
                'number_of_seats_available.required'=>'Chưa nhập số chỗ còn trống',
                'price.required'=>'Chưa nhập giá tiền'
            ]
        );

        $transportation="";
        $tour_time="";

        if (isset($_POST['transportation'])) {
            
            foreach($_POST['transportation'] as $v) {
                echo $v."<br/>";
                $transportation = $v."+". $transportation;
            }  
        }
        $tour->Transportation= $transportation;
        
        if (isset($_POST['tour_time'])) {
            foreach($_POST['tour_time'] as $v) {
                $tour_time = $tour_time." ". $v;
            } 
        }

        tour::where('ID', $id)->update(['Tour_Name' => $request->tour, 
                                        'Tour_Name_URL' => changeTitle($request->tour),
                                        'ID_Directory' => $request->iddirectory,
                                        'ID_Place' => $request->idplaces,
                                        'ID_Tag' => $request->idtag,
                                        'Transportation' => $transportation,
                                        'Tour_Time' => $tour_time,
                                        'Place_Of_Departure' => $request->place_of_departure,
                                        'Departure_Day' => $request->departure_day,
                                        'Describe' => $request->describe,
                                        'Number_Of_Seats_Available' => $request->number_of_seats_available,
                                        'Price' => $request->price
                                        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/tour/edit/'.$id)->with('loi','Bạn chỉ được chọn file image có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalExtension();
            $image = str_random(4)."_". $name;
            while (file_exists("upload/tour/".$image)) {
                $image = str_random(4)."_". $name;
            }
            $file->move("upload/tour",$image);
            tour::where('ID', $id)->update(['Image' => $image]);
        }
        else
        {
            tour::where('ID', $id)->update(['Image' => $tour->Image]);
        }

        return redirect('admin/tour/edit/'.$id)->with('notification','Sửa Thành Công - ' .$request->tour.' ');
    }


}
