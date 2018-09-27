<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ShoppingCart\ShoppingCart;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{

	/**
     * Shows the items in the cart
     * @return void
     */
   	public function index(Request $request){   
   	$shoppingcart = new ShoppingCart($request);
   	$all = $shoppingcart->getAll();
   	$articles = [];
   	foreach ($all as $article) {
   	$articles[] = DB::table("articles")->where('article_id',$article->name)->first();
   }
   	$total = $this->calc($shoppingcart);
   	return view('cart', compact("all", "articles", "total"));
}

	/**
     * Add a new item into and add count in the cart
     * @return void
     */
	public function call(Request $request, $id){
		$ShoppingCart = new ShoppingCart($request);
		$ShoppingCart->add($id);
		return back();
	}

    /**
     * Delete item in the cart
     * @return void
     */
	public function delete(Request $request, $id){
		$ShoppingCart = new ShoppingCart($request);
		$ShoppingCart->remove($id);
		return redirect("/cart");
	}

    /**
     * Calculate the total price of the product
     * @return void
     */
	public function calc($ShoppingCart){
		$total = 0;
	foreach ($ShoppingCart->getAll() as $article) {
		$price = DB::table("articles")->where('article_id',$article->name)->first()->price * $article->quantity;
		$total += $price;
	} 
		return $total;
	}

    /**
     * Change amount of the item
     * @return void
     */
	public function updateItem(Request $request){
		$save = $_POST;
		$shoppingcart = $request->session()->get("Shoppingcart");
		foreach ($shoppingcart as $item) {
			if ($item->name == $save["id"]) {
				$item->quantity = $save["quantity"];
			}
		}
		return back();
	}
}

