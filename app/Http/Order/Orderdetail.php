<?php
namespace App\Http\Order;



class OrderDetail extends \Illuminate\Database\Eloquent\Model
{
    public $fillable = ['order_id', 'article_id', 'count'];
}