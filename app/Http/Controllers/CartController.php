<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Cart;
use App\Tour;
class CartController extends Controller
{

    public function AddCart(Request $request ,$id, $quantyCart){
		$product = DB::table('tour')->where('ID', $id)->first();
		$idTour = Tour::find($id);
    	if ($product != null) {
    		$oldCart = Session('Cart') ? Session('Cart') : null;
			$newCart = new Cart($oldCart);
			if ($quantyCart < $idTour->Number_Of_Seats_Available) {
				$newCart->AddCart($product, $id);
			}
    		
    		$request->session()->put('Cart', $newCart);
    	}
        return view('pages.cart');
      
    }

    public function DeleteItemCart(Request $request ,$id){
		$oldCart = Session('Cart') ? Session('Cart') : null;
		$newCart = new Cart($oldCart);
		$newCart->DeleteItemCart($id);

		if (count($newCart->products) > 0) {
			$request->Session()->put('Cart', $newCart);
		}
		else{
			$request->Session()->forget('Cart');
		}

    	return view('pages.cart');
	}
	
	public function DeleteItemListCart(Request $request ,$id){
		$oldCart = Session('Cart') ? Session('Cart') : null;
		$newCart = new Cart($oldCart);
		$newCart->DeleteItemCart($id);

		if (count($newCart->products) > 0) {
			$request->Session()->put('Cart', $newCart);
		}
		else{
			$request->Session()->forget('Cart');
		}

    	return view('pages.ajaxListCart');
    }

	
    public function SaveListItemCart(Request $request, $id, $quanty){
    	$oldCart = Session('Cart') ? Session('Cart') : null;
		$newCart = new Cart($oldCart);
		$idTour = Tour::find($id);
		if ($quanty <1) {
			
			$newCart->DeleteItemCart($id);

			if (count($newCart->products) > 0) {
				$request->Session()->put('Cart', $newCart);
			}
			else{
				$request->Session()->forget('Cart');
			}
		}
		else{
			if ($quanty <= $idTour->Number_Of_Seats_Available ) {
				$newCart->UpdateItemCart($id, $quanty);
			}
		}
		$request->session()->put('Cart', $newCart);
		
    	return view('pages.ajaxListCart');
	}


	
}