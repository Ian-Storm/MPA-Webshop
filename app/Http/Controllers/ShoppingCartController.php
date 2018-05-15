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
   return view('cart', compact("all", "articles"));
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

}
