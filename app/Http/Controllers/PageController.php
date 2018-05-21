<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Blog;

class PageController extends Controller
{
    public function getIndex()
    {
        $categories = Category::all();
        $hot_products = Product::where('hot','1')->orderBy('id', 'desc')->limit(10)->get();
        $new_products = Product::where('new', '1')->orderBy('id', 'desc')->limit(10)->get();
        $blogs = Blog::orderBy('id', 'desc')->get();
        return view('page.index', compact('categories', 'hot_products', 'new_products', 'blogs'));
    }
}
