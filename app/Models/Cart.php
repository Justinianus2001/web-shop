<?php

namespace App\Models;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart) {
		if ($oldCart) {
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id) {
		$price = $item->promotion_price != 0 ? $item->promotion_price : $item->unit_price;
		$cart = ['qty' => 0, 'price' => $price, 'item' => $item];
		if ($this->items) {
			if (array_key_exists($id, $this->items)) {
				$cart = $this->items[$id];
			}
		}
		$cart['qty']++;
		$cart['price'] = $price * $cart['qty'];
		$this->items[$id] = $cart;
		$this->totalQty ++;
		$this->totalPrice += $price;
	}
	
	public function reduceByOne($id) {
		$this->items[$id]['qty'] --;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty --;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if ($this->items[$id]['qty'] <= 0) {
			unset($this->items[$id]);
		}
	}
	
	public function removeItem($id) {
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
