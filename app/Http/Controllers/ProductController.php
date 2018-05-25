<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Category;
use App\Brand;
use Toastr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        $brands = Brand::all()->pluck('name', 'id');
        return view('admin.products.add', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Input::except('image');
        $data['alias'] = str_slug($data['name']);
        $file=$request->file('image');
    	$filename=$file->getClientOriginalName('image');
    	$request->file=$filename;
    	$images=time().".".$filename;
    	$destinationPath=public_path('/page/img/products');
    	$file->move($destinationPath,$images);
    	$data['image']=$images;
        $product = Product::create($data);
        Toastr::success('Add successful product', $title = null, $options = []);
        return redirect()->route('list-product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all()->pluck('name', 'id');
        $brands = Brand::all()->pluck('name', 'id');
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = Input::except('image');
        if ($request->hasFile('image'))
	       {
            $oldfile=public_path('page/img/products/').$product->image;
            unlink($oldfile);
			$file=$request->file('image');
	    	$filename=$file->getClientOriginalName('image');
	    	$request->file=$filename;
	    	$images=time().".".$filename;
	    	$destinationPath=public_path('page/img/products');
	    	$file->move($destinationPath,$images);
	    	$data['image']=$images;
            }
        $product ->update($data);
        Toastr::success('Edit successful product', $title = null, $options = []);
        return redirect()->route('list-product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (file_exists(public_path('page/img/products/').$product->image))
            {
                $oldfile=public_path('page/img/products/').$product->image;
                unlink($oldfile);
            }
        $product->images()->delete();
    	$product->delete();
        Toastr::success('Delete successful product', $title = null, $options = []);
    	return redirect()->route('list-product');
    }
}
