<?php

namespace App;
/**
* 
*/
class MyCart 
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	function __construct($oldCart)
	{
		// if items are already added to cart pass an object of the cart for reuse
		if ($oldCart) {
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	} 

	public function addToCart($item, $id, $qty){
		// declare an array that contains stored item
		$storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
		if ($this->items) {
			if (array_key_exists($id, $this->items)) {
				// putting the incoming item into a variable
				$storedItem = $this->items[$id];
			}
		}

		// increase cart items, price and quantity
		 $storedItem['qty'] += $qty;
		 $storedItem['price'] = $item->price->price * $storedItem['qty'];
		 $this->items[$id] = $storedItem;
		 $this->totalPrice += $item->price->price * $qty;
		 $this->totalQty += $qty;		
	}

	public function updateCart($item, $id, $qty){
		// update cart items
		unset($this->items[$id]);
		$this->totalQty -= $qty;
		$this->totalPrice -=  $item->price->price * $qty;
		$this->addToCart($item, $id, $qty);
	}

	public function reduceCart($item, $id, $qty)
	{
		// pass the item to be reduced and the quantity of items to be removed

		$storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
		if ($this->items) {
			if (array_key_exists($id, $this->items)) {
				// putting the incoming item into a variable
				$storedItem = $this->items[$id];
			}
		}

		// remove the specified quantity from the cart
		 $storedItem['qty'] -= $qty;
		 $storedItem['price'] = $item->price->price * $storedItem['qty'];
		 $this->items[$id] = $storedItem;
		 $this->totalPrice -= $item->price->price * $qty;
		 $this->totalQty -= $qty;	
	}



	public function removeItem($id){

		// get id and remove item with this id

		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}