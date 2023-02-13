<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('product.products', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product\create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image_url' => 'nullable|image'
        ]);

        $product = Product::create($validatedData);

        if ($request->hasFile('image_url')) {
            $image_url = $request->file('image_url');
            $filename = time().'.'.$image_url->getClientOriginalExtension();
            Image::make($image_url)->resize(300, 300)->save(public_path('\uploads\products\ '.$filename));
            $product->image_url = $filename;
            $product->save();
        }
        

        return redirect('/products')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified product.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image_url' => 'nullable|image'
        ]);

        if ($request->hasFile('image_url')) {
            $image_url = $request->file('image_url');
            $filename = time().'.'.$image_url->getClientOriginalExtension();
            Image::make($image_url)->resize(300, 300)->save(public_path('\uploads\products\ '.$filename));
            $product->image_url = $filename;
            $product->save();
        }

        $product->update($request->only(['name','description','price']));

        return redirect('/products')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'Product deleted successfully');
    }
}