<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;


class CommentController extends Controller
{
    public function getDelete($id, $idTour)
    {
        
        Comment::where('ID', $id)->delete();
        
        return redirect('admin/tour/edit/'.$idTour)->with('notification','Đã xóa Comment ID: '.$id.' ');
    }

}
