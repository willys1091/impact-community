<?php

namespace App\Http\Controllers;

use App\Blog;
use App\CategoryContent;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        /*if ($request->session()->has('username')) {
            $blog = Blog::all();
            return view('admin.blog.index', compact('blog'));
        }else {
            return redirect('/ia-admin');
        }*/
        
        $blog = Blog::all();
        return view('admin.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category = CategoryContent::all();
        $city = Blog::where('category','like','%8%')->get();
        return view('admin.blog.create')
        ->with('category',$category)
        ->with('city',$city);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $this->validate($request, [
			'title' => 'required',
            'published' => 'required',
			'url' => 'required',
        ]);
         
        /*$image_name="default.jpeg";
        if ($request->file('file')) {
            $file = $request->file('file');
            $tujuan_upload = 'img/blog/thumbnail';
            $image_name= time().'.'.$file->getClientOriginalExtension();
            
          // upload file
          $file->move($tujuan_upload,$image_name);
          //$pic_name=$file->getClientOriginalName();
        }
        $image_url = asset('img/blog/thumbnail/'.$image_name);*/


        $content = new Blog();

		$content->title = $request->title;
        $content->published = $request->published;
        $content->url = $request->url;
        
        $content->thumbnail_img = $request->img_url;
        if ($request->category == ["5"]) {
            $content->content = '-';
        } else {
            $content->content = $request->description_text;
        }
        if ($request->category == ["8"]) {
            $content->parent = $request->parent;
        } else {
            $content->parent = null;
        }
        
        $content->category = json_encode($request->category);
		$content->save();


        /*    Blog::create([
                'title' => $request->title,
                'published' => $request->published,
                'url' => $request->url,
                'content' => $request->description_text,
                'thumbnail_img' => $image_name
            ]);*/
        


        return redirect()->route('admin.content.index')->with('status','Article Success to Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog,Request $request)
    {
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($content,Blog $blog,Request $request)
    {
        $category = CategoryContent::all();
        $blog = Blog::where('id',$content)->first();
        $city = Blog::where('category','like','%8%')->get();
        return view('admin.blog.create', compact('blog'))
        ->with('category',$category)
        ->with('city',$city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update($content,Request $request, Blog $blog)
    {
        $blog = Blog::where('id',$content)->first();
        $this->validate($request, [
			'title' => 'required',
            'published' => 'required',
			'url' => 'required',
        ]);

        /*$image_name="default.jpeg";
        if ($request->file('file') && $request->pic_indicator == 'yes') {
            $file = $request->file('file');
            $tujuan_upload = 'img/blog/thumbnail';
            $image_name= time().'.'.$file->getClientOriginalExtension();
            $image_url = asset('img/blog/thumbnail/'.$image_name);
          // upload file
          $file->move($tujuan_upload,$image_name);
          //$pic_name=$file->getClientOriginalName();
          Blog::where('id',$blog->id)
          ->update([
              'thumbnail_img' => $image_url,
          ]);
        }*/
        $content = Blog::find($blog['id']);

        $content->title = $request->title;
        $content->published = $request->published;
        $content->url = $request->url;
        $content->thumbnail_img = $request->img_url;
        if ($request->category == ["5"]) {
            $content->content = $request->description_text;;
        } else {
            $content->content = $request->description_text;
        }
        if ($request->category == ["8"]) {
            $content->parent = $request->parent;
        } else {
            $content->parent = null;
        }
        //$content->content = $request->description_text;
        //$content->thumbnail_img = $image_url;
        $content->category = json_encode($request->category);
        $content->save();
        
        return redirect()->route('admin.content.index')->with('status','Article Success to Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($content,Blog $blog)
    {
        $blog = Blog::where('id',$content)->first();
        Blog::destroy($blog['id']);
        return redirect()->route('admin.content.index')->with('status','Blog Has Been Deleted!');
    }
}
