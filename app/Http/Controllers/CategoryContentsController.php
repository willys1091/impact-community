<?php

namespace App\Http\Controllers;

use App\CategoryContent;
use Illuminate\Http\Request;

class CategoryContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = CategoryContent::all();
        return view('admin.blog.category_index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        return redirect()->route('admin.categorycontent.index')->with('status','category Success to Added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryContent  $categoryContent
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryContent $categoryContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryContent  $categoryContent
     * @return \Illuminate\Http\Response
     */
    public function edit($categorycontent,CategoryContent $categoryContent)
    {
        $categoryContent = CategoryContent::where('id',$categorycontent)->first();
        $category = CategoryContent::all();
        return view('admin.blog.category_index')
        ->with('category',$category)
        ->with('categorycontent',$categoryContent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryContent  $categoryContent
     * @return \Illuminate\Http\Response
     */
    public function update($categorycontent, Request $request, CategoryContent $categoryContent)
    {
        $this->validate($request, [
			'name' => 'required',
			'url' => 'required',
        ]);

        //$categoryContent = CategoryContent::where('id',$categorycontent)->first();
        
        $categorycontent = CategoryContent::find($categorycontent);

        $categorycontent->name = $request->name;
        $categorycontent->description = $request->description;
        $categorycontent->url = $request->url;
        $categorycontent->parent = $request->parent;
        $categorycontent->type = $request->type;
        
		$categorycontent->save();

        return redirect()->route('admin.categorycontent.index')->with('status','category Success to updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryContent  $categoryContent
     * @return \Illuminate\Http\Response
     */
    public function destroy($categorycontent, CategoryContent $categoryContent)
    {
        $categoryContent = CategoryContent::where('id',$categorycontent)->first();
        CategoryContent::destroy($categoryContent['id']);
        return redirect()->route('admin.categorycontent.index')->with('status','Category Has Been Deleted!');
    }
}
