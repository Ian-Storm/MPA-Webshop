<?php
namespace App\Http\ShoppingCart;
class ShoppingItem
{
	public $name;
	public $quantity;

	/**
     * create a new item
     * @param $id id of item to create
     * @param $numb numb of item quantity
     */
	function __construct($id, $numb)
	{
		$this->name = $id;
		$this->quantity = $numb;
	}
}