<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;


class SlideController extends Controller
{
    public function getList()
    {
    	$slide = Slide::all();
    	return view('admin.slide.list');
    }

     public function add()
    {
    	return view('admin.slide.add');
    }

    public function postAdd(Request $request)
    {
    	$this->validate($request,
            [
                'slide_name' => 'required|min:3|max:50|unique:slide,Slide_Name',
                'img'=>'required',
                'link'=>'required'
            ],
            [
                'slide_name.required'=>'Bạn chưa nhập tên Slide ',
                'slide_name.min'=>'Độ dài kí tự Slide phải trên 3',
                'slide_name.unique'=>'Tên Slide đã tồn tại.',
                'slide_name.max'=>'Độ dài kí tự Slide không quá 50',
                'img.required'=>'Bạn chưa chọn Ảnh',
                'link.required'=>'Bạn chưa nhập link'
            ]
        );

        $slide = new Slide;
        $slide->Slide_Name = $request->slide_name;
        if ($request->has('link')) {
        	$slide->Link = $request->link;
        }

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/slide/add')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalExtension();
            $Hinh = str_random(4)."_". $name;
            while (file_exists("upload/slide/".$Hinh)) {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("upload/slide",$Hinh);
            $slide->Image = $Hinh;
        }
        else
        {
            $slide->Image="";
        }

        $slide->save();

        return redirect('admin/slide/add')->with('notification','Bạn đã thêm thành công');
    }

    public function getEdit($id)
    {
       $slide = Slide::find($id);
    	return view('admin.slide.edit', ['slide1'=>$slide]);
    }

    public function postEdit(Request $request, $id)
    {
    	$this->validate($request,
            [
                'slide_name' => 'required|min:3|max:50',
                'link'=>'required'
            ],
            [
                'slide_name.required'=>'Bạn chưa nhập tên Slide ',
                'slide_name.min'=>'Độ dài kí tự Slide phải trên 3',
                'slide_name.max'=>'Độ dài kí tự Slide không quá 50',
                'link.required'=>'Bạn chưa nhập link'
            ]
        );

    	$slide = Slide::find($id);
        Slide::where('ID', $id)->update(['Slide_Name' => $request->slide_name]);
        if ($request->has('link')) {
        	Slide::where('ID', $id)->update(['Link' => $request->link]);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/slide/edit/'.$id)->with('loi','Bạn chỉ được chọn file image có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalExtension();
            $image = str_random(4)."_". $name;
            while (file_exists("upload/slide/".$image)) {
                $image = str_random(4)."_". $name;
            }
            $file->move("upload/slide",$image);
            Slide::where('ID', $id)->update(['Image' => $image]);
        }
        else
        {
            Slide::where('ID', $id)->update(['Image' => $slide->Image]);
        }

        return redirect('admin/slide/edit/'.$id)->with('notification','Bạn đã sửa thành công');
    }

    public function getDelete($id)
    {
        Slide::where('ID', $id)->delete();

        return redirect('admin/slide/list')->with('notification','Bạn đã xóa thành công ID: '.$id.' ');
    }



  
}
