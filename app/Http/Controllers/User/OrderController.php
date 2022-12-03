<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Cart::where('ip_address', request()->ip())->whereNotNull('order_id')->get();
        return view('user.order.list', compact('orders'));
    }

    public function store(Request $request)
    {
        $order = new Order;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->note = $request->note;
        $order->table_no = $request->table_no;
        $order->save();
        $carts = Cart::where('ip_address', request()->ip())->where('order_id', null)->get();
            foreach ($carts as $item) {
                $item['order_id']=$order->id;
                $item->save();
            }
        return redirect('/');
    }

}
