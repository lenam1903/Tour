<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});


Route::get('admin/login','UserController@getLoginAdmin');
Route::post('admin/login','UserController@postLoginAdmin');
Route::get('admin/logout','UserController@getLogoutAdmin');

Route::group(['prefix'=>'admin', 'middleware' => 'adminLogin'], function(){

	Route::group(['prefix'=>'user'], function(){
		Route::get('list','UserController@getList');

		Route::get('add','UserController@add');
		Route::post('add','UserController@postAdd');

		Route::get('edit/{id}','UserController@getEdit');
		Route::post('edit/{id}','UserController@postEdit');

		Route::get('delete/{id}','UserController@getDelete');

	});

	Route::group(['prefix'=>'directory'], function(){
		Route::get('list','DirectoryController@getList');

		Route::get('add','DirectoryController@add');
		Route::post('add','DirectoryController@postAdd');

		Route::get('edit/{id}','DirectoryController@getEdit');
		Route::post('edit/{id}','DirectoryController@postEdit');

		Route::get('delete/{id}','DirectoryController@getDelete');

	});

	Route::group(['prefix'=>'places'], function(){
		Route::get('list','PlacesController@getList');

		Route::get('add','PlacesController@add');
		Route::post('add','PlacesController@postAdd');

		Route::get('edit/{id}','PlacesController@getEdit');
		Route::post('edit/{id}','PlacesController@postEdit');

		Route::get('delete/{id}','PlacesController@getDelete');

	});

	Route::group(['prefix'=>'tour'], function(){
		Route::get('list','TourController@getList');

		Route::get('add','TourController@add');
		Route::post('add','TourController@postAdd');

		Route::get('edit/{id}','TourController@getEdit');
		Route::post('edit/{id}','TourController@postEdit');

		Route::get('delete/{id}','TourController@getDelete');
		

	});

	Route::group(['prefix'=>'slide'], function(){
		Route::get('list','SlideController@getList');

		Route::get('add','SlideController@add');
		Route::post('add','SlideController@postAdd');

		Route::get('edit/{id}','SlideController@getEdit');
		Route::post('edit/{id}','SlideController@postEdit');

		Route::get('delete/{id}','SlideController@getDelete');
	});

	Route::group(['prefix'=>'comment'], function(){
		Route::get('delete/{id}/{idTour}','CommentController@getDelete');
	});

	Route::group(['prefix'=>'ajax'], function(){
		Route::get('tour/{iddirectory}','AjaxController@getPlaces');
		Route::get('tour/directory/{id}','AjaxController@getDirectory');
		Route::get('tour/img/{img}','AjaxController@getImg');
		Route::get('slide/img/{img}','AjaxController@getImgSlide');
		

	});

});





Route::get('/Add-Cart/{id}/{quantyCart}', 'CartController@AddCart');

Route::POST('/Delete-Item-Cart/{id}', 'CartController@DeleteItemCart');

Route::post('/Delete-Item-List-Cart/{id}', 'CartController@DeleteItemListCart');

Route::post('/Save-Item-List-Cart/{id}/{quanty}', 'CartController@SaveListItemCart');










Route::get('home','PageController@home');

Route::get('DetailTour/{id}','PageController@detailTour');

Route::post('Review/{idTour}/{idUser}','PageController@review');

Route::get('List-Cart','PageController@listCart');

Route::post('register','PageController@postRegister');

Route::get('check-out/{id}','PageController@checkOut');

Route::get('contact','PageController@contact');

Route::post('/CheckOut-Info/{idTour}/{idUser}', 'PageController@postCheckOutInfo');

Route::get('/AdultAjax/{id}', 'PageController@adultAjax');

Route::get('/ChildrenAjax/{id}', 'PageController@childrenAjax');

Route::get('/BabyAjax/{id}', 'PageController@babyAjax');

Route::get('Search','PageController@search');

Route::get('SearchPlaces/{id}','PageController@searchPlaces');

Route::get('SearchMaxMin','PageController@searchMaxMin');

Route::get('SearchMinMax','PageController@searchMinMax');

Route::get('SearchStar','PageController@searchStar');

Route::get('Bill','PageController@bill');



// Route::get('loaitin/{id}/{TenKhongDau}.html','PagesController@loaitin');
// Route::get('tintuc/{id}/{TenKhongDau}.html','PagesController@tintuc');


