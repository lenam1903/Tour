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

Route::post('register','UserController@postRegister');

Route::post('login','UserController@postLogin');

Route::get('logout','UserController@getLogout');

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

	Route::group(['prefix'=>'thongke'], function(){
		Route::get('thongke','PageController@thongke');
		Route::post('filter-by-day','PageController@filter_by_date');
		Route::post('dasboard-filter','PageController@dasboard_filter');
		Route::post('chart30days','PageController@chart30days');
		
	});

	Route::group(['prefix'=>'lich-su-nap-tien'], function(){
		
		Route::get('list','LichSuGDController@index');

		Route::get('add','LichSuGDController@add');
		Route::post('add','LichSuGDController@postAdd');

		Route::get('edit/{id}','LichSuGDController@getEdit');
		Route::post('edit/{id}','LichSuGDController@postEdit');
		
		Route::get('delete/{id}','LichSuGDController@destroy');
		
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

Route::get('check-out/{id}','PageController@checkOut');

Route::get('contact','PageController@contact');

Route::post('/CheckOut-Info/{idTour}/{idUser}/{balance}', 'PageController@postCheckOutInfo');

Route::get('/AdultAjax/{id}', 'PageController@adultAjax');

Route::get('/ChildrenAjax/{id}', 'PageController@childrenAjax');

Route::get('/BabyAjax/{id}', 'PageController@babyAjax');

Route::get('Search','PageController@search');

Route::get('searchMaxMin','PageController@searchMaxMin');

Route::get('SearchMinMax','PageController@searchMinMax');

Route::get('SearchStar','PageController@searchStar');

Route::get('Bill','PageController@bill');


Route::get('PLaces/{Directory_URL}/{Name_Places_URL}','PageController@places');

Route::get('PLaces/{Directory_URL}/{Name_Places_URL}/search','PageController@searchMaxMin');

Route::get('PLaces/{Directory_URL}/{Name_Places_URL}/searchRate','PageController@searchRate');

Route::post('thanhtoan','PageController@thanhtoan');


Route::get('nap-tien','PageController@napTien');


Route::get('hoa-don-full','PageController@hoaDonFull');

Route::get('edit-users/{id}','PageController@get_edit_users');
Route::post('edit-users/{id}','PageController@post_edit_users');







