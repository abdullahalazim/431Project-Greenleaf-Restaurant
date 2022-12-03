<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        
        $image = array();
        if ($request->hasFile('image')) {
            foreach ($request->image as $key => $photo) {
                $path = $photo->store('uploads/category/photos');
                array_push($image, $path);
            }
            $category['image']=json_encode($image);
        }

        $category->save();
        return redirect()->route('admin.category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('admin.category.index', compact('category','categories'));
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
        $category = Category::find($id);
        $category->name = $request->name;
       
        if($request->image){
           
            $image = array();
            if ($request->hasFile('image')) {
                foreach ($request->image as $key => $photo) {
                    $path = $photo->store('uploads/category/photos');
                    array_push($image, $path);
                }
                $category['image'] = json_encode($image);
            }
        }else{
            $category['image'] = $category->image;
        }
        $category->save();
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('admin.category.index');
    }
}
