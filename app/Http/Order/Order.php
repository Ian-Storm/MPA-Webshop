<?php
namespace App\Http\Order;



class Order extends \Illuminate\Database\Eloquent\Model
{
    public $fillable = ['order_id', 'client_id'];
    public function saveO(){
        $order = $this->create(['client_id'=>auth()->user()->id]);
        
    } 
    public function orderdetails(){
        return $this->hasMany('App\Http\Order\Orderdetail', "order_id", "order_id");
    }
}