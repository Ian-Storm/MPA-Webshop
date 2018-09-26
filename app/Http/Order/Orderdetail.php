<?php
namespace App\Http\Order;



class Orderdetail extends \Illuminate\Database\Eloquent\Model
{
	public $table = "order_details";
    public $fillable = ['order_id', 'article_id', 'count'];
}