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
        $hot_products = Product::where('hot','1')->orderBy('id', 'desc')->limit(10)->get();
        $new_products = Product::where('new', '1')->orderBy('id', 'desc')->limit(10)->get();
        $blogs = Blog::orderBy('id', 'desc')->get();
        return view('page.index', compact('hot_products', 'new_products', 'blogs'));
    }

    public function viewDetailProduct($alias)
    {
        $product = Product::where('alias',$alias)->first();
    	return view('page.single_product', compact('product'));
    }
}
