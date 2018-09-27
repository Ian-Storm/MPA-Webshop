<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Client\Client;
use App\Http\Controllers\OrderController;

class ClientController extends Controller
{

    /**
     * Saving your order
     * @return $ordercontroller
     */
    public function save(Request $request)
    {
        $read = $_POST;
        $client = new Client();
        $client->saveC($read);
        $ordercontroller = new OrderController();
        return $ordercontroller->orderConfirmed($request)
        ;
    }
}
