<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;

class SchedulesController extends Controller{
    public function index(){
        $data['category'] = Schedule::orderBy('time','desc')->get();
        return view('admin/schedule/index',$data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request){
        $this->validate($request, [
			'name' => 'required',
			'url' => 'required',
        ]);

        $Schedule = new Schedule();
        $Schedule->name = $request->name;
        $Schedule->time = date("Y-m-d H:i:s",strtotime($request->time));
        $Schedule->url = $request->url;

		$Schedule->save();

        return redirect('admin/schedule')->with('status','Schedule Success to Added!');

    }


    public function show(Schedule $Schedule)
    {
        //
    }


    public function edit($id){
        $data['category'] = Schedule::orderBy('time','desc')->get();
        $data['Schedule'] = Schedule::where('id',$id)->first();
        return view('admin/schedule/index',$data);
    }


    public function update(Request $request, Schedule $Schedule){
        $this->validate($request, [
			'name' => 'required',
			'url' => 'required',
        ]);

        $d=strtotime($request->time);
        $date = date("Y-m-d H:i:s", $d);
        $data = Schedule::find($Schedule)->first();

        $data->name = $request->name;
        $data->time = $date;
        $data->url = $request->url;
		$data->save();

        return redirect('admin/schedule')->with('status','Schedule Success to updated!');
    }


    public function destroy(Schedule $Schedule){
        Schedule::destroy($Schedule['id']);
        return redirect('admin/schedule')->with('status','Schedule Has Been Deleted!');
    }
}
