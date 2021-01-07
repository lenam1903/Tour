<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Directory;
use App\Comment;
use App\Places;
use App\Tour;
use App\TourDetails;
use App\User;
use App\Tag;
use App\Slide;
use App\Bill;
use App\BillDetails;
use App\lich_su_nap_tien;
use Illuminate\Support\Facades\Auth;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $directory = Directory::all();
        $comment = Comment::all();
        $places = Places::all();
        
        $tour = Tour::all();
        $tourDetails = TourDetails::all();
        $user = User::all();
        $tag = Tag::all();
        $slide = Slide::all();
        $bill = Bill::all();
        $billDetails = BillDetails::all();
        $lich_su_nap_tien = lich_su_nap_tien::all();
       
        view()->share('directory', $directory);
        view()->share('comment', $comment);
        view()->share('places', $places);
        view()->share('tour', $tour);
        view()->share('tourDetails', $tourDetails);
        view()->share('user', $user);
        view()->share('tag', $tag);
        view()->share('slide', $slide);
        view()->share('bill', $bill);
        view()->share('billDetails', $billDetails);
        view()->share('lich_su_nap_tien', $lich_su_nap_tien);
       
      
        
      
        
        

    }
}
