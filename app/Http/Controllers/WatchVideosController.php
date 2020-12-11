<?php

namespace App\Http\Controllers;

use App\series;
use App\WatchVideo;
use Illuminate\Http\Request;

class WatchVideosController extends Controller{
    use \App\Traits\general;
    public function index(){
        // $data['series']= series::all();
        $data['video'] = WatchVideo::orderBy('created_at','desc')->get();
        return view('admin.watch_video.index',$data);
    }

    public function create(){
        $data['series'] = series::all();
        return view('admin.watch_video.create',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request,
            ['title'=>'required'],
            ['series'=>'required'],
            ['url_video'=>'required'] ,
            ['url_web'=>'required']     
        );
        WatchVideo::create([
            'title' => $request->title,
            'series' => $request->series,
            'url_video' => $request->url_video,
            'url_web' => $request->url_web,
        ]);
        return redirect('admin/watchvideo')->with('status','Video Success to Added!');
    }

    public function show(WatchVideo $watchVideo)
    {
        //
    }

    public function edit($watchvideo, WatchVideo $watchVideo){
        $data['series'] = series::all();
        $data['watchvideo'] = WatchVideo::find($watchvideo);
        return view('admin.watch_video.create',$data);
    }

    public function update($watchvideo,Request $request, WatchVideo $watchVideo){
        $this->validate($request,
            ['title'=>'required'],
            ['series'=>'required'],
            ['url_video'=>'required'] ,
            ['url_web'=>'required']     
        );
        
        $content = WatchVideo::find($watchvideo);
        $content->title = $request->title;
        $content->series = $request->series;
        $content->url_video = $request->url_video;
        $content->url_web = $request->url_web;
        $content->save();
        return redirect('admin/watchvideo');
    }

    public function destroy($watchvideo,WatchVideo $watchVideo){
        WatchVideo::destroy($watchvideo);
        return redirect('admin/watchvideo')->with('status','Video Success to Update!');
    }
}
