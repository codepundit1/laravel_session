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
            'image' => ['nullable'],
            'qty' => ['integer', 'required', 'gte:0'],
            'price' => ['integer', 'required', 'gte:0'],
            'description' => ['required', 'string']
        ]);

        Product::create($valid);
        return redirect()->route('products.index');
    }



    public function edit(Product $product)
    {
        return View('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $valid = $request->validate([
            'name' => ['required', 'string'],
            'image' => ['nullable'],
            'qty' => ['integer', 'required', 'gte:0'],
            'price' => ['integer', 'required', 'gte:0'],
            'description' => ['required', 'string'],
        ]);

        $product->update($valid);
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
