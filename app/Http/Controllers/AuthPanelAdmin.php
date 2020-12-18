<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Admin;
use App\User;
use Auth;
use App\CategoryProduct;
use App\Product;

class AuthPanelAdmin extends Controller
{
    public function show_admin(Request $request){
        if ($request->session()->has('username')) {
            return redirect('/ia-admin/dashboard');
        }else {
            return view('admin.loginform');
        }
    }

    public function show_admin_dashboard(Request $request){
        /*if ($request->session()->has('username')) {
            return view('admin.dashboard');
        }else {
            return redirect('/ia-admin');
        }*/
        //$product = Product::all();
        //$category = CategoryProduct::withAll()->orderBy('category_name')->get();

        return view('admin.dashboard');
    }

    public function OutAdmin(Request $request){
        $request->session()->forget('username');
        $request->session()->flush();
        return redirect()->route('admin.indexlogin');
    }

    public function AuthAdmin(Request $request){
        $this->validate($request,
            ['username'=>'required'],
            ['password'=>'required']
        );

        $user = $request->input('username');
        $pass = $request->input('password');

        $account = Admin::where('username',$user)->first();

        if($account==null){
            return back()->with('status','Login gagal');
        } else{
            $account = $account->where('password',$pass)->first();
            if ($account!=null) {
                $request->session()->put('username',$user);
                $request->session()->put('name',$account->name);
                $request->session()->put('email',$account->email);
                return redirect('admin');
            } else{
                return back()->with('status','Password Salah');
            }
        }
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            //return "oraa";
            return redirect()->intended('/afi-admin');
        }
        else{
            return "Salah";
        }
        /*else if (Auth::guard('user')->attempt(['email' => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/user');
        }*/

    }

    public function getLogin(){
        return view('admin.loginform');
    }

    public function logout(){
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        return redirect('/afi-admin');
    }
}
