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

    public function priceDesc()
    {
        $products = Product::orderBy('unit_price', 'desc')->get();
        return view('page.products', compact('products'));
    }

    public function priceAsc()
    {
        $products = Product::orderBy('unit_price', 'asc')->get();
        return view('page.products', compact('products'));
    }
     public function nameDesc()
    {
        $products = Product::orderBy('name', 'Desc')->get();
        return view('page.products', compact('products'));
    }

    public function nameAsc()
    {
        $products = Product::orderBy('name', 'asc')->get();
        return view('page.products', compact('products'));
    }

    public function catPriceDesc($alias)
    {
        $category = Category::where('alias', $alias)->first();
        $products = Product::where('category_id', $category->id)->orderBy('unit_price', 'desc')->get();
        return view('page.category-products', compact('products', 'category' ));
    }
    public function catPriceAsc($alias)
    {
        $category = Category::where('alias', $alias)->first();
        $products = Product::where('category_id', $category->id)->orderBy('unit_price', 'asc')->get();
        return view('page.category-products', compact('products', 'category' ));
    }
    public function catNameDesc($alias)
    {
        $category = Category::where('alias', $alias)->first();
        $products = Product::where('category_id', $category->id)->orderBy('name', 'desc')->get();
        return view('page.category-products', compact('products', 'category' ));
    }
    public function catNameAsc($alias)
    {
        $category = Category::where('alias', $alias)->first();
        $products = Product::where('category_id', $category->id)->orderBy('name', 'asc')->get();
        return view('page.category-products', compact('products', 'category' ));
    }

}
