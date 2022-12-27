<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index()
    {
        $sub_categories = SubCategory::latest()->get();
        return view('sub_categories.index', compact('sub_categories'));
    }

    public function create()
    {
        return view('sub_categories.create');
    }


    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => ['string', 'min:3', 'max:20'],
            'slug' => ['string', 'min:3', 'max:20'],
        ]);

        SubCategory::create($valid);

        return redirect()->route('sub-categories.index');
    }




    public function edit(SubCategory $subCategory)
    {
        return view('sub_categories.edit', compact('subCategory'));
    }


    public function update(Request $request, SubCategory $subCategory)
    {
        $valid = $request->validate([
            'name' => ['string', 'min:3', 'max:20'],
            'slug' => ['string', 'min:3', 'max:20'],
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
