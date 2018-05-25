<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Brand;
use Toastr;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('admin.brands.list', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|unique:brands',
            'image' => 'required|max:2000',
        ]);
        $data = Input::except('image');
        $data['alias'] = str_slug($data['name']);
        $file=$request->file('image');
    	$filename=$file->getClientOriginalName('image');
    	$request->file=$filename;
    	$images=time().".".$filename;
    	$destinationPath=public_path('/page/img/brand');
    	$file->move($destinationPath,$images);
    	$data['image']=$images;
        $brand = Brand::create($data);
        Toastr::success('Add successful Brand', $title = null, $options = []);
        return redirect('admin-shop/brand/list');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request,
        [
            'name' => 'required',
            'image' => 'max:2000',
        ]);
        $data = Input::all();
        if ($request->hasFile('image'))
	{
            $oldfile=public_path('page/img/brand/').$brand->image;
            unlink($oldfile);
			$file=$request->file('image');
	    	$filename=$file->getClientOriginalName('image');
	    	$request->file=$filename;
	    	$images=time().".".$filename;
	    	$destinationPath=public_path('page/img/brand');
	    	$file->move($destinationPath,$images);
	    	$data['image']=$images;
        $brand ->update($data);
        Toastr::success('Edit successful brand', $title = null, $options = []);
        return redirect('admin-shop/brand/list');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if (file_exists(public_path('page/img/brand/').$brand->image))
            {
                $oldfile=public_path('page/img/brand/').$brand->image;
                unlink($oldfile);
            }
            $brand->products()->delete();
        	$brand->delete();
             Toastr::success('Delete successful brand', $title = null, $options = []);
        	return redirect('admin-shop/brand/list');
    }
}
