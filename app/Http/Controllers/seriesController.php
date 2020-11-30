<?php

namespace App\Http\Controllers;

use App\series;
use Illuminate\Http\Request;


class seriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "Hello";
        //$video = WatchVideo::orderBy('created_at','desc')->get();
        $category = series::all();
        return view('admin.series.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return "Raka";
        return view('admin.watch_video.create');
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

        $series = new series();

        $series->name = $request->name;
       
        $series->url = $request->url;
        
		$series->save();

        return redirect()->route('admin.series.index')->with('status','Series Success to Added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryContent  $categoryContent
     * @return \Illuminate\Http\Response
     */
    public function show(series $series)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryContent  $categoryContent
     * @return \Illuminate\Http\Response
     */
    public function edit(series $series)
    {
        //return $series;
        $category = series::all();
        return view('admin.series.index')
        ->with('category',$category)
        ->with('series',$series);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryContent  $categoryContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, series $series)
    {
        $this->validate($request, [
			'name' => 'required',
			'url' => 'required',
        ]);

        //$categoryContent = CategoryContent::where('id',$categorycontent)->first();
        
        $series = series::find($series->id);

        $series->name = $request->name;
       
        $series->url = $request->url;
        
		$series->save();

        return redirect()->route('admin.series.index')->with('status','category Success to updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryContent  $categoryContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(series $series)
    {
        series::destroy($series->id);
        return redirect()->route('admin.series.index')->with('status','Category Has Been Deleted!');
    }
}

