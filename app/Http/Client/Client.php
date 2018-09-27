<?php
namespace App\Http\Client;


class Client extends \Illuminate\Database\Eloquent\Model 
{
    public $fillable = ['user_id', 'name', 'street', 'housenumber', 'state', 'country', 'phone'];

    /**
     * Save client to database
     * @return $client
     */    
    function saveC($read){
        $client = $this->create(['user_id'=>auth()->user()->id, 
            'name'=>$read['name'],
            'street'=>$read['street'],
            'housenumber'=>$read['housenumber'],
            'state'=>$read['state'],
            'country'=>$read['country'], 
            'phone'=>$read['phone']
            ]);
        return $client;
    }    
}
