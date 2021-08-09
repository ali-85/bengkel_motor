<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;

class UserController extends Controller
{
    public function getLogin()
    {
        return view('login.index');
    }
    public function postLogin(Request $request) 
    {
        $this->validate($request, [
            'uname' => 'required',
            'password' => 'required'
        ]);
        
        if (Auth::attempt(['username' => $request->input('uname'),'password' => $request->input('password'),'role' => 1])) {
            return redirect()->route('admin.index');
        }elseif(Auth::attempt(['username' => $request->input('uname'),'password' => $request->input('password')])){
            return Redirect()->route('cashier.index');
        } else {
            return Redirect()->back()->with('danger','Username or password not correct !');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('Login')->with('success','Successfully Logout from your account!');
    }
}
