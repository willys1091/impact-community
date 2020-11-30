<?php

namespace App\Http\Controllers;

use App\series;
use App\WatchVideo;
use Illuminate\Http\Request;

class WatchVideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = series::all();
        $video = WatchVideo::orderBy('created_at','desc')->get();
        return view('admin.watch_video.index')
        ->with('video',$video)
        ->with('series',$series);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return "Raka";
        $series = series::all();
        return view('admin.watch_video.create')->with('series',$series);
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
            ['title'=>'required'],
            ['series'=>'required'],
            ['url_video'=>'required'] ,
            ['url_web'=>'required']     
        );
        //return $request;
        WatchVideo::create([
            'title' => $request->title,
            'series' => $request->series,
            'url_video' => $request->url_video,
            'url_web' => $request->url_web,
        ]);

        return redirect()->route('admin.watchvideo.index')->with('status','Video Success to Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WatchVideo  $watchVideo
     * @return \Illuminate\Http\Response
     */
    public function show(WatchVideo $watchVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WatchVideo  $watchVideo
     * @return \Illuminate\Http\Response
     */
    public function edit($watchvideo, WatchVideo $watchVideo)
    {
        //$category = CategoryContent::all();
        //$blog = Blog::where('id',$content)->first();
        //$city = Blog::where('category','like','%8%')->get();
        $series = series::all();
        $watchvideo = WatchVideo::find($watchvideo);
        return view('admin.watch_video.create')
        ->with('series',$series)
        ->with('watchvideo',$watchvideo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WatchVideo  $watchVideo
     * @return \Illuminate\Http\Response
     */
    public function update($watchvideo,Request $request, WatchVideo $watchVideo)
    {
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

        /*WatchVideo::create([
            'title' => $request->title,
            'series' => $request->series,
            'url_video' => $request->url_video,
            'url_web' => $request->url_web,
        ]);*/

        return redirect()->route('admin.watchvideo.index')->with('status','Video Success to Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WatchVideo  $watchVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy($watchvideo,WatchVideo $watchVideo)
    {
        WatchVideo::destroy($watchvideo);
        return redirect()->route('admin.watchvideo.index')->with('status','Video Has Been Deleted!');
    }
}
