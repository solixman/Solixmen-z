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

class AuthController extends Controller
{
    public function register(Request $request)
    {
     

        
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
            return back()->with('error', $validator->errors());
        }

        $user = User::create([
            'firstName' => $request->get('firstName'),
            'lastName' => $request->get('lastName'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        Auth::login($user);

        return redirect("/")->with('welcome', 'Welcome, ' . $user->firstName . '!');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            
            $user = Auth::user();
    
            return redirect('/')->with('welcome', 'Welcome back, ' . $user->firstName . '!');
        }else{
            return back()->with('error','wrong credentials');
        }
    }



    // User logout
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('Success','Successfully logged out');
    }
}
