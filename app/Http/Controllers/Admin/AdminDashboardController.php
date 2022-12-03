<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $categories = Category::count();
        $products = Product::count();
        return view('admin.index', compact('orders', 'categories', 'products'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
