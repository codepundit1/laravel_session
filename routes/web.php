<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class)->except('show');
Route::resource('categories', CategoryController::class)->except('show');
Route::resource('sub-categories', SubCategoryController::class)
    ->except('show')
    ->parameters(['sub-categories' => 'subCategory']);
