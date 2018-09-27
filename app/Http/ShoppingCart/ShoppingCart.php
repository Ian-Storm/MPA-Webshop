<?php
namespace App\Http\ShoppingCart;

use App\Http\ShoppingCart\ShoppingItem;

class ShoppingCart
{
    const SHOPPINGCART = 'Shoppingcart';
    private $items = [];
    private $session;

     /**
     * create new cart
     * @param $request = request
     */
	public function __construct($request)
	{
        $this->session = $request->session();
        $this->items = $this->session->has( self::SHOPPINGCART ) ? $this->session->get( self::SHOPPINGCART ) : [];
    }

    /**
     * add item to cart
     * @param $id id of item to add
     */
    public function add($id)
    {
    	if(empty($this->items))
    	{
    		$item = new ShoppingItem($id,1);
			$this->session->push(self::SHOPPINGCART, $item);
			$this->items[] = $item;
    	}else
    	{
            
    		if($this->getItem($id))
    		{
    			$item = $this->getItem($id);
    			$item->quantity += 1;
    		}
            else
            {
        		$item = new ShoppingItem($id,1);
        		$this->session->push(self::SHOPPINGCART,$item);
        		$this->items[] = $item;
            }
    	}   
    	
    }

    /**
     * get all items in cart
     */
    public function getAll()
    {
    	if(!$this->isEmpty()){
    		return $this->items;
    	}
    }

    /**
     * delete an item in cart
     * @param $id id of item to delete
     */
    public function remove($id)
    {
		$item = $this->getItem($id);
    	$cart = $this->session->get(self::SHOPPINGCART);
        $this->session->forget(self::SHOPPINGCART);
        for($i=0;$i<sizeof($cart);$i++)
        {
            if($cart[$i] == $item)
            {
                continue;
            }
            $this->session->push(self::SHOPPINGCART,$cart[$i]);
        }
        
    	for($i=0;$i<sizeof($this->items);$i++)
        {
            if($this->items[$i] == $item)
            {
                unset($this->items[$i]);
            }
        }
    }

    /**
     * empty your shoppingcart
     */
    public function removeAll()
    {
    	$this->session->forget(self::SHOPPINGCART);
    }

    /**
     * check if cart is empty
     */
    public function isEmpty()
    {
        if(empty($this->items))
        	{
        		//empty
        		return false;
        	}
    }

    /**
    *	@param $id Id of shopping item
    *	@return A shopping item
    */
    public function getItem($id)
    {
    	for($i=0;$i<sizeof($this->items);$i++)
		{
			if($this->items[$i]->name == $id)
			{
				return $this->items[$i];
			}
		}
        return false;
    }
}