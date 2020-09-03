<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Places;


class PlacesController extends Controller
{
    public function getList()
    {
    	return view('admin.places.list');
    }

    public function add()
    {
    	return view('admin.places.add');
    }

    public function getDelete($id)
    {
        
        Places::where('ID', $id)->delete();
        
        return redirect('admin/places/list')->with('notification','Success Delete ID: '.$id.' ');
    }


    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'places' => 'required|min:3|max:20|unique:places,Name_Places'     
            ],
            [
                'places.required'=>'Bạn chưa nhập Địa Điểm.',
                'places.min'=>'Độ dài kí tự phải trên 3',
                'places.unique'=>'Địa Điểm đã tồn tại.',
                'places.max'=>'Độ dài kí tự không quá 20'
            ]
        );

        $places = new Places;

        $places->Name_Places = $request->places;
        $places->Name_Places_URL = changeTitle($request->places);
        $places->ID_Directory = $request->iddirectory;

        $places->save();

        return redirect('admin/places/add')->with('notification','Thêm Thành Công - ' .$request->places.' ');
    }

    public function getEdit($id)
    {
        $places = Places::find($id);

        return view('admin.places.edit', ['places1'=>$places]);
    }

    public function postEdit(Request $request, $id)
    {
        $places = Places::find($id);
        $this->validate($request,
            [
                'places' => 'required|min:3|max:20|unique:places,Name_Places',
                'directory' => 'required'
            ],
            [
                'places.required'=>'Bạn chưa nhập Địa Điểm.',
                'places.min'=>'Độ dài kí tự phải trên 3',
                'places.unique'=>'Địa Điểm đã tồn tại.',
                'places.max'=>'Độ dài kí tự không quá 20',
                'directory.required'=>'Bạn chưa nhập Danh Mục.',
            ]
        );

        places::where('ID', $id)->update(['Name_Places' => $request->places, 
                                        'Name_Places_URL' => changeTitle($request->places),
                                        'ID_Directory' => $request->directory
                                        ]);

        return redirect('admin/places/edit/'.$id)->with('notification','Sửa Thành Công - ' .$request->places.' ');
    }


}
