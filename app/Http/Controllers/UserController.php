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
        try
        {
        $users=User::paginate(5);
    
        if(count($users)==1){
            throw new Exception('you have no customers now');
        }
     
    return view("/admin/partials/Customers", compact('users'));
    }catch(Exception $e){
        return view("/admin/partials/Customers")->with('error',$e->getMessage());
    }
    }

    public function suspend(Request $request){
        try{
            $user = User::find($request['id']);
            $user->status = 'suspended';
            $user->save();
            return back()->with('success',"user suspended succesfully :(  " );
        }catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    public function changeRole(Request $request){

    $user= User::find($request['id']);
    dd($user->role);
    $user->role = Role::find($request['rolename']);



    }


    public function profileAdmin(Request $request){
        try{
            $user=User::find($request['id']);
            if( $user == null){
                return back()->with('error','something is wrong with this user account');
            }

            $roles=Role::all();
            return view('admin/partials/profile', compact('user','roles'));
        }catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }


    public function Update(Request $request){
try{
        $user=User::find($request['userId']);
        if($user->role->name != $request['role']){
        $role=Role::where('name',$request['role'])->first();
        $user->role_id = $role->id;
    }
    
    $user->name=$request['name'];
    $user->email=$request['email'];
    $user->bio=$request['bio'];
    $user->phoneNumber=$request['phone'];



    $user->save();

        return back()->with('success','Personal Information Updated Succesfully');
}catch(Exception $e){
    return back()->with('error','something went wrong');
}
    }


}
