<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;

class SortController extends Controller
{
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
    public function braPriceDesc($alias)
    {
        $brand = Brand::where('alias', $alias)->first();
        $products = Product::where('brand_id', $brand->id)->orderBy('unit_price', 'desc')->get();
        return view('page.brand-products', compact('products', 'brand' ));
    }
    public function braPriceAsc($alias)
    {
        $brand = Brand::where('alias', $alias)->first();
        $products = Product::where('brand_id', $brand->id)->orderBy('unit_price', 'asc')->get();
        return view('page.brand-products', compact('products', 'brand' ));
    }
    public function braNameDesc($alias)
    {
        $brand = Brand::where('alias', $alias)->first();
        $products = Product::where('brand_id', $brand->id)->orderBy('name', 'desc')->get();
        return view('page.brand-products', compact('products', 'brand' ));
    }
    public function braNameAsc($alias)
    {
        $brand = Category::where('alias', $alias)->first();
        $products = Product::where('brand_id', $brand->id)->orderBy('name', 'asc')->get();
        return view('page.brand-products', compact('products', 'brand' ));
    }
}
