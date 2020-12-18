<?php

namespace App\Http\Controllers;

use App\Blog;
use App\CategoryContent;
use Illuminate\Http\Request;

class BlogController extends Controller{
    public function index(Request $request){
        $data['blog'] = Blog::all();
        return view('admin.blog.index',$data);
    }

    public function create(Request $request){
       
        $data['category'] = CategoryContent::all();
        $data['city'] = Blog::where('category','like','%8%')->get();
        return view('admin.blog.create',$data);
    }

    public function store(Request $request){
        ini_set('post_max_size', '600M');
        ini_set('upload_max_filesize','200M');
        ini_set("memory_limit", "100M");
        $this->validate($request, [
			'title' => 'required',
            'published' => 'required',
			'url' => 'required',
        ]);
         

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
        

        return redirect('admin/content')->with('status','Article Success to Added!');
    }

    public function show(Blog $blog,Request $request){
        return view('admin.blog.show', compact('blog'));
    }

   
    public function edit($content,Blog $blog,Request $request){
        $data['category'] = CategoryContent::all();
        $data['blog'] = Blog::where('id',$content)->first();
        $data['city'] = Blog::where('category','like','%8%')->get();
        return view('admin.blog.create', $data);
    }

    public function update($content,Request $request, Blog $blog){
        $blog = Blog::where('id',$content)->first();
        $this->validate($request, [
			'title' => 'required',
            'published' => 'required',
			'url' => 'required',
        ]);

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
        
        $content->category = json_encode($request->category);
        $content->save();
        
        return redirect('admin/content')->with('status','Article Success to Update!');
    }

    public function destroy($content,Blog $blog){
        $blog = Blog::where('id',$content)->first();
        Blog::destroy($blog['id']);
        return redirect('admin/content')->with('status','Blog Has Been Deleted!');
    }
}
