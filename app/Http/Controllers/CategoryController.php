<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }


    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => ['string', 'min:3', 'max:20'],
            'slug' => ['string', 'min:3', 'max:20'],
        ]);

        Category::create($valid);

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $valid = $request->validate([
            'name' => ['string', 'min:3', 'max:20'],
            'slug' => ['string', 'min:3', 'max:20'],
        ]);

        $category->update($valid);

        return redirect()->route('categories.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
