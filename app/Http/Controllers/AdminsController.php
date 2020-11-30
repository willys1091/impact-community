<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
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
             //back()->withInput()->with(['retype_password_error' => 'Password not same!']);;
        }
         
        /*$image_name="default.jpeg";
        if ($request->file('file')) {
            $file = $request->file('file');
            $tujuan_upload = 'img/blog/thumbnail';
            $image_name= time().'.'.$file->getClientOriginalExtension();
            
          // upload file
          $file->move($tujuan_upload,$image_name);
          //$pic_name=$file->getClientOriginalName();
        }
        $image_url = asset('img/blog/thumbnail/'.$image_name);*/

        $ID = Admin::first()->id;
        $content = Admin::find($ID);

		$content->username = $request->username;
        $content->name = $request->name;
        if ($request->password != null) {
            $content->password = $request->password;
        }
        $content->save();
        $request->session()->put('name',$request->name);


        /*    Blog::create([
                'title' => $request->title,
                'published' => $request->published,
                'url' => $request->url,
                'content' => $request->description_text,
                'thumbnail_img' => $image_name
            ]);*/
        


        return redirect()->route('admin.edit_account')->with('status','Account Success Edited!');
    }
}
