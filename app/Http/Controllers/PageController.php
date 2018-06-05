<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\Blog;
use App\Slide;

class PageController extends Controller
{
    public function getIndex()
    {
        $hot_products = Product::where('hot','1')->orderBy('id', 'desc')->limit(10)->get();
        $new_products = Product::orderBy('id', 'desc')->limit(10)->get();
        $blogs = Blog::orderBy('id', 'desc')->get();
        $slides = Slide::all();
        return view('page.index', compact('hot_products', 'new_products', 'blogs', 'slides'));
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

    public function allProduct()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('page.products', compact('products'));
    }

    public function category_products($alias)
    {
        $category = Category::where('alias', $alias)->first();
        $products = Product::where('category_id', $category->id)->orderBy('id', 'desc')->get();
        return view('page.category-products', compact('products', 'category' ));
    }

    public function brand_products($alias)
    {
        $brand = Brand::where('alias', $alias)->first();
        $products = Product::where('brand_id', $brand->id)->orderBy('id', 'desc')->get();
        return view('page.brand-products', compact('products', 'brand'));
    }
}
