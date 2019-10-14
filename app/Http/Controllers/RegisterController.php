<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Illuminate\Http\Request;
use App\Events\UserRegistered;

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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:6|max:20|same:password',
         ]);
        

        $user = Sentinel::registerAndActivate($request->all());
        event(new UserRegistered($user));
        

        $role = Sentinel::findRoleBySlug('user');
        $role->users()->attach($user);
        return redirect('/');
    }
}
