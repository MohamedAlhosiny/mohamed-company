<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        // return $product;
        return view('products.index', compact('product'));
    }

public function download(Product $product) {
    return $product;
}

    public function create()
    {
        return view('products.create');
    }



    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|string|min:5',
            'title'=>'required|string|min:10'
        ]);
        $product = new Product();

        $product->name = $request->name;
        $product->title = $request->title;
        $product->user_id = auth()->id();
        $product->save();

        return redirect()->route('product.index')->with('success', 'Data added successfully');

    }




    public function show(Product $product)
    {

    }




    public function edit(Product $product)
    {
        // $product = Product::find($id);
        return view('products.edit', compact('product'));
    }




    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'string|min:5',
            'title'=>'string|min:1'
        ]);
// $product = Product::find($id);

    $product->name =  $request->name;
    $product->title = $request->title;
    $product->user_id = auth()->id();
    $product->update();

    return redirect()->route('product.index')->with('success' , "Data Updated");

    }




    public function destroy(Product $product)
    {
        //
        // $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('success' , 'data deleted');
    }
}
