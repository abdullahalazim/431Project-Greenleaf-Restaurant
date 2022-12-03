<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);
        return view('user.product.details', compact('product'));
    }

    public function category($id)
    {
        $products = Product::where('category_id',$id)->get();
        return view('user.product.category_list', compact('products'));
    }
}
