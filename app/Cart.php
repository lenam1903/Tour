<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "tour";
    public $products = null;
    public $totalPrice = 0;
	public $totalQuanty = 0;
	

    public function __construct($cart){
    	if ($cart) {
    		$this->products = $cart->products;
    		$this->totalPrice = $cart->totalPrice;
    		$this->totalQuanty = 0;
    	}

	}
	
    public function AddCart($product, $id){
    	$newProduct = ['quanty' => 0, 'price' => $product->Price,'productInfo' => $product];
    	if ($this->products) {
    		if (array_key_exists($id, $this->products)) {
    			$newProduct = $this->products[$id];
    		}
    	}

    	
    	$newProduct['price'] = $product->Price;
    	$this->products[$id] = $newProduct;
    	$this->totalPrice += $product->Price;
  
    }

    public function DeleteItemCart($id){
    	$this->totalQuanty -= $this->products[$id]['quanty'];
    	$this->totalPrice -= $this->products[$id]['price'];
    	unset($this->products[$id]);

    }

    public function UpdateItemCart($id, $quanty){
    	$this->totalQuanty -= $this->products[$id]['quanty'];
    	$this->totalPrice -= $this->products[$id]['price'];

    	$this->products[$id]['quanty'] = $quanty;
    	$this->products[$id]['price'] = $quanty * $this->products[$id]['productInfo']->Price;

    	$this->totalQuanty = 0;
    	$this->totalPrice += $this->products[$id]['price'];


    }
}