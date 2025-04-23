<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        try {
            $users = User::paginate(7);

            if (count($users) == 1) {
                throw new Exception('you have no customers now');
            }

            return view("/admin/partials/Customers", compact('users'));
        } catch (Exception $e) {
            return view("/admin/partials/Customers")->with('error', $e->getMessage());
        }
    }

    public function suspend(Request $request)
    {
        try {
            $user = User::findOrFail($request['id']);
            $user->status = 'suspended';
            $user->save();
            return back()->with('success', "user suspended succesfully :(  ");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

 
    public function profileAdmin(Request $request)
    {
        try {
            $user = User::findOrFail($request['id']);
            if ($user == null) {
                return back()->with('error', 'something is wrong with this user account');
            }

            $roles = Role::all();
            return view('admin/partials/profile', compact('user', 'roles'));
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function Update(Request $request)
    {

        try {
            $fields = $request->validate([
               'name' =>'required|string|max:255',
               'role'=>'required|string|max:255',
               'email'=>'required|string|email|max:255',
               'bio'=>'required|string|',
               'phone'=>'numeric|required|digits:11'
            ]);
        } catch (Exception $e) {
                 return back()->with('error',$e->getMessage());
                }
        
        
                try {
            

            $user = User::findOrFail($fields['userId']);
            if ($user->role->name != $fields['role']) {
                $role = Role::where('name', $fields['role'])->first();
                $user->role_id = $role->id;
            }

            $user->name = $fields['name'];
            $user->email = $fields['email'];
            $user->bio = $fields['bio'];
            $user->phoneNumber = $fields['phone'];



            $user->save();

            return back()->with('success', 'Personal Information Updated Succesfully');
        } catch (Exception $e) {
            return back()->with('error', 'something went wrong');
        }
    }
}
