<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class webshop_controller extends Controller
{

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(){
        $this->middleware("auth");
    }

    /**
     * Shows the categories with products
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $articles =[];    
        $categories = DB::table("categories")->get();
        if ($id != null) {
           $article_id = DB::table("articles_and_categories")->select("article_id")->where("category_id", $id)->get();
        foreach ($article_id as $id) {
            $articles[] = DB::table("articles")->where("article_id", $id->article_id)->first(); 
        }
        }
        return view('webshop', ["articles" => $articles, "categories" => $categories]);
    }
}
