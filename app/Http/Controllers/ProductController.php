<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        // dd($request->input());
        $valid = $request->validate([
            'name' => ['required', 'string'],
            'image' =>['nullable'],
            'qty' => ['integer', 'required', 'gte:0'],
            'price' => ['integer', 'required', 'gte:0'],
            'description' => ['required', 'string']
        ]);

        Product::create($valid);
            return redirect()->route('products.index');
    }



    public function edit(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}
