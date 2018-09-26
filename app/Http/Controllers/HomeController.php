<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Order\Order;
use App\Http\Client\Client;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Client::where('user_id', auth()->user()->id )->first()->client_id;

        return view('home', ['order' => Order::where('client_id', $id)->get()]);
    }
}
