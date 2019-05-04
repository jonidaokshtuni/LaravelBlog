<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class LoginController extends Controller
{
    public function login()
    {
        return view('authentication.login');
    }

    public function postLogin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:posts|max:255',
            'password' => 'required',
        ]);
    
        Sentinel::authenticate($request->all());
        
        $slug = Sentinel::getUser()->roles()->first()->slug ;

        if($slug == 'admin')
           return redirect('admin/dashboard');
        elseif($slug == 'user')
           return redirect('user/dashboard');
    }

    public function logout()
    {
        Sentinel::logout();
        return redirect('/login');
    }
}
