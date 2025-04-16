<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class JWTAuthController extends Controller
{
    public function register(Request $request)
    {

        // dd($request['email']);

        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
            return back()->with('error', $validator->errors());
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        Auth::login($user);

        return redirect("/")->with('welcome', 'Welcome, ' . $user->name . '!');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            
            $user = Auth::user();
    
            return redirect('/')->with('welcome', 'Welcome back, ' . $user->name . '!');
        }
    
        return back()->with('error','Invalid credentials. Please check your email and password.')->withInput();
    }



    // User logout
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('Success','Successfully logged out');
    }
}
