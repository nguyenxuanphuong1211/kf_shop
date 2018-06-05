<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Slide;
use Toastr;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::orderBy('id', 'desc')->get();
        return view('admin.slider.list', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.add');
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
            'image' => 'required|max:2000',
        ]);
        $data = Input::except('image');
        $file=$request->file('image');
    	$filename=$file->getClientOriginalName('image');
    	$request->file=$filename;
    	$images=time().".".$filename;
    	$destinationPath=public_path('/page/img/slider');
    	$file->move($destinationPath,$images);
    	$data['image']=$images;
        $brand = Slide::create($data);
        Toastr::success('Add successful Slide', $title = null, $options = []);
        return redirect()->route('list-slide');
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
    public function edit(Slide $slide)
    {
        return view('admin.slider.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        $this->validate($request,
        [
            'image' => 'max:2000',
        ]);
        $data = Input::except('image');
        if ($request->hasFile('image'))
		{
            if (file_exists(public_path('page/img/slider/').$slide->image))
                {
                    $oldfile=public_path('page/img/slider/').$slide->image;
                    unlink($oldfile);
                }
            $file=$request->file('image');
            $filename=$file->getClientOriginalName('image');
	    	$request->file=$filename;
	    	$images=time().".".$filename;
	    	$destinationPath=public_path('page/img/slider');
	    	$file->move($destinationPath,$images);
	    	$data['image']=$images;
        }
        $slide ->update($data);
        Toastr::success('Edit successful slide', $title = null, $options = []);
        return redirect('admin-shop/slide/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        if (file_exists(public_path('page/img/slider/').$slide->image))
            {
                $oldfile=public_path('page/img/slider/').$slide->image;
                unlink($oldfile);
            }
        	$slide->delete();
             Toastr::success('Delete successful slide', $title = null, $options = []);
        	return redirect()->route('list-slide');
    }
}
