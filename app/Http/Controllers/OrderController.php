<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Order\Order;
use App\Http\Order\Orderdetail;

use App\Http\Client\Client;

class OrderController extends Controller
{
    private $shoppingData;

    /**
     * requesting the shoppingcart
     * @return \Illuminate\Http\Response
     */
    public function clientdata(Request $request)
    {
        $shoppingData = $request->session()->get('Shoppingcart');
        return view('client');
    }

    /**
     * confirm the order to send a thanks message
     * @return \Illuminate\Http\Response
     */
    public function orderConfirmed($request)
    {
        $this->save($request);
        return view('tnx');
    }

    /**
     * saves the whole order
     */
    public function save($request){
        $order = new Order();
        $client = Client::where('user_id', auth()->user()->id)->first();
        $order->client_id = $client->client_id;
        $order->save();
        $shoppingcart = $request->session()->get("Shoppingcart");
        $orderdetails = new Orderdetail();
        // list every item from the shoppingcart seperatly to save in order details
        foreach ($shoppingcart as $item) {
            $orderdetails->create([
                "order_id" => $order->id,
                "article_id" => $item->name,
                "count" => $item->quantity
            ]);
        }
            $request->session()->forget('Shoppingcart');     
    }
}