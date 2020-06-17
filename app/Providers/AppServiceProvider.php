<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Directory;
use App\Comment;
use App\Places;
use App\TicketList;
use App\Tour;
use App\TourDetails;
use App\User;
use App\Tag;
use App\Slide;
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
        $ticketlist = TicketList::all();
        $tour = Tour::all();
        $tourdetails = TourDetails::all();
        $user = User::all();
        $tag = Tag::all();
        $slide = Slide::all();
       
        view()->share('directory', $directory);
        view()->share('comment', $comment);
        view()->share('places', $places);
        view()->share('ticketList', $ticketlist);
        view()->share('tour', $tour);
        view()->share('tourdetails', $tourdetails);
        view()->share('user', $user);
        view()->share('tag', $tag);
        view()->share('slide', $slide);
       
      
        
      
        
        

    }
}
