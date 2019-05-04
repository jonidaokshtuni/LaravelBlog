<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('authentication.register');
    }

    public function postRegister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:posts|max:255',
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);


        $user = Sentinel::registerAndActivate($request->all());
        

        $role = Sentinel::findRoleBySlug('user');
        $role->users()->attach($user);
        return redirect('/');
    }
}
