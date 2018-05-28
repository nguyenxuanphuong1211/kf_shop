<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Category;
use App\Brand;
use App\Image;
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

        $images_rel = array();
        if($files_rel = $request->file('image-rel'))
        {
            foreach($files_rel as $file_rel)
            {
                $dt = new Image;
                $dt->product_id = $product->id;
                $name = time()."_".$file_rel->getClientOriginalName();
                $destinationPath = public_path('/page/img/products');
                $file_rel->move($destinationPath, $name);
                $images_rel[]=$name;
                $dt ->name = $name;
                $dt ->save();
            }
        }
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
               if(file_exists(public_path('page/img/products/').$product->image))
               {
                   $oldfile=public_path('page/img/products/').$product->image;
                   unlink($oldfile);
               }
			$file=$request->file('image');
	    	$filename=$file->getClientOriginalName('image');
	    	$request->file=$filename;
	    	$images=time().".".$filename;
	    	$destinationPath=public_path('page/img/products');
	    	$file->move($destinationPath,$images);
	    	$data['image']=$images;
            }
        $product ->update($data);

        $images_rel = $product->images()->get();
        foreach($images_rel as $image_rel)
            {
                if (file_exists(public_path('page/img/products/').$image_rel->name))
                    {
                        $old_rel_file=public_path('page/img/products/').$image_rel->name;
                        unlink($old_rel_file);
                    }
            }

        $images_rel = array();
        if($files_rel = $request->file('image-rel'))
        {
            foreach($files_rel as $file_rel)
            {
                $dt = new Image;
                $dt->product_id = $product->id;
                $name = time()."_".$file_rel->getClientOriginalName();
                $destinationPath = public_path('/page/img/products');
                $file_rel->move($destinationPath, $name);
                $images_rel[]=$name;
                $dt ->name = $name;
                $dt ->save();
            }
        }

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
        $images_rel = $product->images()->get();
        if (file_exists(public_path('page/img/products/').$product->image))
            {
                $oldfile=public_path('page/img/products/').$product->image;
                unlink($oldfile);
            }
            foreach($images_rel as $image_rel)
            {
                if (file_exists(public_path('page/img/products/').$image_rel->name))
                    {
                        $old_rel_file=public_path('page/img/products/').$image_rel->name;
                        unlink($old_rel_file);
                    }
            }

        $product-> images()->delete();
    	$product->delete();
        Toastr::success('Delete successful product', $title = null, $options = []);
    	return redirect()->route('list-product');
    }
}
