<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ShoppingCart\ShoppingCart;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{
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
	public function call(Request $request, $id){
		$ShoppingCart = new ShoppingCart($request);
		$ShoppingCart->add($id);
		return back();
	}

	public function delete(Request $request, $id){
		$ShoppingCart = new ShoppingCart($request);
		$ShoppingCart->remove($id);
		return redirect("/cart");
	}

	public function calc($ShoppingCart){
		$total = 0;
	foreach ($ShoppingCart->getAll() as $article) {
		$price = DB::table("articles")->where('article_id',$article->name)->first()->price * $article->quantity;
		$total += $price;
	} 
	return $total;
	}

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
