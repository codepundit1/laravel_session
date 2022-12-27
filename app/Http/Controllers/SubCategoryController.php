<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index()
    {
        $sub_categories = SubCategory::with('category')->latest()->get();
        return view('sub_categories.index', compact('sub_categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('sub_categories.create',compact('categories'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => ['string', 'min:3', 'max:20'],
            'slug' => ['string', 'min:3', 'max:20'],
            'category_id' => ['required'],
        ]);

        SubCategory::create($valid);

        return redirect()->route('sub-categories.index');
    }




    public function edit(SubCategory $subCategory)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('sub_categories.edit', compact('subCategory','categories'));
    }


    public function update(Request $request, SubCategory $subCategory)
    {
        $valid = $request->validate([
            'name' => ['string', 'min:3', 'max:20'],
            'slug' => ['string', 'min:3', 'max:20'],
            'category_id' => ['required'],

        ]);

        $subCategory->update($valid);

        return redirect()->route('sub-categories.index');
    }

    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return redirect()->back();
    }
}
