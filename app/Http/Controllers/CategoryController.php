<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $products = $category->products()->paginate(10);
        return view('categories.show', compact('category', 'products'));
    }



    public function showCategory($categorySlug)
{
    $category = Category::where('slug', $categorySlug)->first();
    if (!$category) {
        abort(404);
    }
    
    $products = Product::where('category_id', $category->id)->get();
    return view('products.category', compact('products', 'category'));
}

}
