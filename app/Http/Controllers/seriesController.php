<?php

namespace App\Http\Controllers;

use App\series;
use Illuminate\Http\Request;

class seriesController extends Controller{
    public function index(){
        $data['category'] = series::all();
        return view('admin.series.index',$data);
    }

    public function create(){
        return view('admin.watch_video.create');
    }

    public function store(Request $request){
        $this->validate($request, [
			'name' => 'required',
			'url' => 'required',
        ]);

        $series = new series();
        $series->name = $request->name;
        $series->url = $request->url;
		$series->save();
        return redirect('admin/series')->with('status','Series Success to Added!');
    }

    public function show(series $series){
        //
    }

    public function edit(series $series){
        $data['series'] = $series;
        $data['category'] = series::all();
        return view('admin.series.index',$data);
    }

    public function update(Request $request, series $series){
        $this->validate($request, [
			'name' => 'required',
			'url' => 'required',
        ]);
        
        $series = series::find($series->id);
        $series->name = $request->name;
        $series->url = $request->url;
		$series->save();
        return redirect('admin/series')->with('status','category Success to updated!');
    }

    public function destroy(series $series){
        series::destroy($series->id);
        return redirect('admin/series')->with('status','Category Has Been Deleted!');
    }
}

