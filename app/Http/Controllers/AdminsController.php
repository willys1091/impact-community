<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminsController extends Controller{
    public function index(){
        $data['admin'] = admin::all();
        return view('admin.admin.index',$data);
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = $request->password;
		$admin->save();

        return redirect('admin/admin')->with('status','Admin Success to Added!');
    }

    public function show(Admin $admin){
        //
    }

    public function edit($id){
        $data['admin'] = Admin::all();
        $data['admins'] = Admin::where('id',$id)->first();
        return view('admin/admin/index',$data);
    }

    public function update(Request $request,$id){
        $this->validate($request, [
			'name' => 'required',
            'username' => 'required',
            'email' => 'required',
        ]);

        $data = Admin::findorfail($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $request->password<>''? $data->password = $request->password :"";
		$data->save();

        return redirect('admin/admin')->with('status','Admin Success to updated!');
    }

    public function destroy($id){
        Admin::destroy($id);
        return redirect('admin/admin')->with('status','Admin Has Been Deleted!');
    }

    public function edit_account(){
        $account = Admin::first();
        return view('admin.edit_account')->with('account',$account);
    }

    public function edit_account_post(Request $request){
        $this->validate($request, [
			'username' => 'required',
            'name' => 'required',
			
        ]);
        if ($request->password != null && $request->password != $request->retype_password) {
            return redirect()->back()->with('retype_password_error', 'Password not Same!')->withInput();
        }
        
        $ID = Admin::first()->id;
        $content = Admin::find($ID);

		$content->username = $request->username;
        $content->name = $request->name;
        if ($request->password != null) {
            $content->password = $request->password;
        }
        $content->save();
        $request->session()->put('name',$request->name);
        return redirect()->route('admin.edit_account')->with('status','Account Success Edited!');
    }
}
