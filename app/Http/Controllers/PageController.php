<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Blog;
use App\Slide;

class PageController extends Controller
{
    public function getIndex()
    {
        $hot_products = Product::where('hot','1')->orderBy('id', 'desc')->limit(10)->get();
        $deals_products = Product::where('deals', '1')->orderBy('id', 'desc')->limit(10)->get();
        $blogs = Blog::orderBy('id', 'desc')->get();
        $slides = Slide::all();
        return view('page.index', compact('hot_products', 'deals_products', 'blogs', 'slides'));
    }

    public function viewDetailProduct($alias)
    {
        $product = Product::where('alias',$alias)->first();
    	return view('page.single_product', compact('product'));
    }

    public function allBlog()
    {
        $blogs = Blog::orderBy('id', 'desc')->get();
        return view('page.blog', compact('blogs'));
    }

    public function blogDetail($alias)
    {
        $blog = Blog::where('alias', $alias)->first();
        $blogs_last = Blog::orderBy('id', 'desc')->take(10)->get();
        return view('page.blog-detail', compact('blog', 'blogs_last'));
    }
}
