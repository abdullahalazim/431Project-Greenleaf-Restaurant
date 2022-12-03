<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.createOrUpdate', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->place = $request->place;
        $product->unit = $request->unit;
        $product->description = $request->description;

        $image = array();
        if ($request->hasFile('image')) {
            foreach ($request->image as $key => $photo) {
                $path = $photo->store('uploads/product/photos');
                array_push($image, $path);
            }
            $product['image']=json_encode($image);
        }


        $product->save();
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.createOrUpdate', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->place = $request->place;
        $product->unit = $request->unit;
        $product->description = $request->description;

        if($request->image){
            $image = array();
            if ($request->hasFile('image')) {
                foreach ($request->image as $key => $photo) {
                    $path = $photo->store('uploads/product/photos');
                    array_push($image, $path);
                }
                $product['image'] = json_encode($image);
            }
        }else{
            $product['image'] = $product->image;
        }
        $product->save();
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('admin.product.index');
    }
}
