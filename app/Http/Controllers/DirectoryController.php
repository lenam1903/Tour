<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Directory;


class DirectoryController extends Controller
{
    public function getList()
    {
    	return view('admin.directory.list');
    }

    public function add()
    {
    	return view('admin.directory.add');
    }

    public function getDelete($id)
    {
        
        Directory::where('ID', $id)->delete();
        
        return redirect('admin/directory/list')->with('notification','Success Delete ID: '.$id.' ');
    }


    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'directory' => 'required|min:3|max:20|unique:directory,Directory'     
            ],
            [
                'directory.required'=>'Bạn chưa nhập Danh Mục.',
                'directory.min'=>'Độ dài kí tự phải trên 3',
                'directory.unique'=>'Danh Mục đã tồn tại.',
                'directory.max'=>'Độ dài kí tự không quá 20'
            ]
        );

        $directory = new Directory;
        $directory->Directory = $request->directory;
        $directory->Directory_URL = changeTitle($request->directory);
       
        $directory->save();

        return redirect('admin/directory/list')->with('notification','Success Add -' .$request->directory.' ');
    }

    public function getEdit($id)
    {
        $directory = Directory::find($id);

        return view('admin.directory.edit', ['directory'=>$directory]);
    }

    public function postEdit(Request $request, $id)
    {
        $directory = Directory::find($id);
        $this->validate($request,
            [
                'directory' => 'required|min:3|max:20|unique:directory,Directory'
            ],
            [
                'directory.required'=>'Bạn chưa nhập Danh Mục.',
                'directory.min'=>'Độ dài kí tự phải trên 3',
                'directory.unique'=>'Danh Mục đã tồn tại.',
                'directory.max'=>'Độ dài kí tự không quá 20'
            ]
        );

        Directory::where('ID', $id)->update(['Directory' => $request->directory, 
                                        'Directory_URL' => changeTitle($request->directory)
                                        ]);

        return redirect('admin/directory/edit/'.$id)->with('notification','Success Edit - ' .$request->directory.' ');
    }


}
