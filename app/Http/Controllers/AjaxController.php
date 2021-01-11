<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Places;
use App\Directory;
use App\Tour;


class AjaxController extends Controller
{
     public function getPlaces($iddirectory)
     {
          $places = Places::where('ID_Directory', $iddirectory)->get();
          foreach ($places as $p) {
               echo "<option value='".$p->ID."'>".$p->Name_Places."</option>";
          }
     }

     public function getDirectory($id)
     {
          $directory = Directory::all();
          foreach ($directory as $d) {
               echo "<option value='".$d->ID."'>".$d->Directory."</option>";
               getPlaces($id);
          }
     }

     public function getImg($img)
     {
          echo "<img width='400px' height='300px' src='upload/tour/".$img."'>";    
     }

     public function getImgSlide($img)
     {
          echo "<img width='900px' height='300px' src='css/images/slider/".$img."'>";    
     }
}

?>
