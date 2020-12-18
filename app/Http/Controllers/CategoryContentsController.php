<?php

namespace App\Http\Controllers;

use App\CategoryContent;
use Illuminate\Http\Request;

class CategoryContentsController extends Controller{
    public function index(){
        $data['category'] = CategoryContent::all();
        return view('admin.blog.category_index',$data);
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $this->validate($request, [
			'name' => 'required',
			'url' => 'required',
        ]);

        $categorycontent = new CategoryContent();
        $categorycontent->name = $request->name;
        $categorycontent->description = $request->description;
        $categorycontent->url = $request->url;
        $categorycontent->parent = $request->parent;
        $categorycontent->type = $request->type;
		$categorycontent->save();
        return redirect('admin/categorycontent')->with('status','category Success to Added!');

    }

    public function show(CategoryContent $categoryContent){
        //
    }

    public function edit($categorycontent,CategoryContent $categoryContent){
        $categoryContent = CategoryContent::where('id',$categorycontent)->first();
        $category = CategoryContent::all();
        return view('admin.blog.category_index')
        ->with('category',$category)
        ->with('categorycontent',$categoryContent);
    }

    public function update($categorycontent, Request $request, CategoryContent $categoryContent){
        $this->validate($request, [
			'name' => 'required',
			'url' => 'required',
        ]);

        $categorycontent = CategoryContent::find($categorycontent);

        $categorycontent->name = $request->name;
        $categorycontent->description = $request->description;
        $categorycontent->url = $request->url;
        $categorycontent->parent = $request->parent;
        $categorycontent->type = $request->type;
        
		$categorycontent->save();

        return redirect('admin/categorycontent')->with('status','category Success to updated!');
    }

    public function destroy($categorycontent, CategoryContent $categoryContent){
        $categoryContent = CategoryContent::where('id',$categorycontent)->first();
        CategoryContent::destroy($categoryContent['id']);
        return redirect('admin/categorycontent')->with('status','Category Has Been Deleted!');
    }
}
