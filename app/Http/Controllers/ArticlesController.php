<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{

    /**
     * Display a listing of the articles
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
    	$article = DB::table("articles")->where("article_id", $id)->first();
        return view('article' , ["article" => $article]);
    }
}