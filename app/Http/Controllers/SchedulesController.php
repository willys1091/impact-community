<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Schedule::orderBy('time','desc')->get();
        return view('admin.schedule.index', compact('category'));
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

        $d=strtotime($request->time);
        $date = date("Y-m-d H:i:s", $d);
        $Schedule = new Schedule();

        $Schedule->name = $request->name;
        $Schedule->time = $date;
        $Schedule->url = $request->url;
        
		$Schedule->save();

        return redirect()->route('admin.schedule.index')->with('status','Schedule Success to Added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $Schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $Schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $Schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $Schedule)
    {
       // return $Schedule;
        //$Schedule = Schedule::where('id',$Schedule)->first();
        $category = Schedule::orderBy('time','desc')->get();
        return view('admin.schedule.index')
        ->with('category',$category)
        ->with('Schedule',$Schedule);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $Schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $Schedule)
    {
        $this->validate($request, [
			'name' => 'required',
			'url' => 'required',
        ]);

        //$Schedule = Schedule::where('id',$Schedule)->first();
        $d=strtotime($request->time);
        $date = date("Y-m-d H:i:s", $d);
        $data = Schedule::find($Schedule)->first();

        $data->name = $request->name;
        $data->time = $date;
        $data->url = $request->url;
		$data->save();

        return redirect()->route('admin.schedule.index')->with('status','Schedule Success to updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $Schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $Schedule)
    {
        //return $Schedule;
        //$Schedule = Schedule::where('id',$Schedule)->first();
        Schedule::destroy($Schedule['id']);
        return redirect()->route('admin.schedule.index')->with('status','Schedule Has Been Deleted!');
    }
}
