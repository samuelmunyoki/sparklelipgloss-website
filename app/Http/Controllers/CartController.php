<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;


class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        return view('carthome.cart', compact('cartItems'));
        
    }
    
    public function orderNow(Request $request)
    {
        $order_amount = 0;
        $str = rand();
        $orderid = strtoupper(md5($str));
        $cartItems = \Cart::getContent();
        foreach($cartItems as $item)
        {
            $order_amount = $order_amount+$item->price;
            Order::create([
            'order_id' =>$orderid,
            'order_prod_id' => $item->id,
            'user_id' => Auth()->user()->id,
            'email' => Auth()->user()->email,
        ]); 
        }
        OrderDetail::create([
            'order_id'=>$orderid,
            'order_amount'=>$order_amount,
            'email' => Auth()->user()->email
            ]);
        $request ->session()->put('orderNumber',  $orderid);
        
       \Cart::clear();

    return redirect()->route('cart.list')->with('success', ('Order was Placed Sucessfully'));;
    }
    
    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' =>$request->id,
            'name' => $request->name,
            'price' =>$request->price,
            'quantity' => $request->quantity,
            'attribute' =>array(
                'image' =>$request->image,
            )
        ]);
        
        return redirect()->back()->with('success', _('Item added to cart successfully.'));
    }
    
    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->prod_id,
            [
                'quantity' =>[
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        session()->flash('success', 'Product updated.');
        return redirect()->route('cart.list');
    }
    
    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
 
        return redirect()->route('cart.list')->with('success', _('Item removed successfully.'));
    }
    
    public function clearAllCart()
    {
        \Cart::clear();
        session()->flash('success', 'All items have been removed from cart.');
        return redirect()->route('cart.list');
    }
}
