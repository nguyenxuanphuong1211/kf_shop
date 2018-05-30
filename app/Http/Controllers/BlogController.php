<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Blog;
use Toastr;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->get();
        return view('admin.blogs.list', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.add');
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
            'title' => 'required|unique:blogs',
            'content' => 'required',
            'description'=>'required',
            'thumbnail' => 'required|max:2000',
        ]);
        $data = Input::except('thumbnail');
        $data['alias'] = str_slug($data['title']);
        $file=$request->file('thumbnail');
    	$filename=$file->getClientOriginalName('thumbnail');
    	$request->file=$filename;
    	$images=time().".".$filename;
    	$destinationPath=public_path('/page/img/blog');
    	$file->move($destinationPath,$images);
    	$data['thumbnail']=$images;
        $brand = Blog::create($data);
        Toastr::success('Add successful Blog', $title = null, $options = []);
        return redirect()->route('list-blog');

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
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validate($request,
        [
            'title' => 'required',
            'content' => 'required',
            'description'=> 'required',
            'thumbnail' => 'max:2000',
        ]);
        $data = Input::except('thumbnail');
        $data['alias'] = str_slug($data['title']);
        if ($request->hasFile('thumbnail'))
		{
            if(file_exists(public_path('page/img/blog/').$blog->thumbnail))
            {
                $oldfile=public_path('page/img/blog/').$blog->thumbnail;
                unlink($oldfile);
            }
            $file=$request->file('thumbnail');
            $filename=$file->getClientOriginalName('thumbnail');
	    	$request->file=$filename;
	    	$images=time().".".$filename;
	    	$destinationPath=public_path('page/img/blog');
	    	$file->move($destinationPath,$images);
	    	$data['thumbnail']=$images;
        }
        $blog ->update($data);
        Toastr::success('Edit successful blog', $title = null, $options = []);
        return redirect('admin-shop/blog/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if (file_exists(public_path('page/img/blog/').$blog->thumbnail))
            {
                $oldfile=public_path('page/img/blog/').$blog->thumbnail;
                unlink($oldfile);
            }
        	$blog->delete();
             Toastr::success('Delete successful blog', $title = null, $options = []);
        	return redirect()->route('list-blog');
    }
}
