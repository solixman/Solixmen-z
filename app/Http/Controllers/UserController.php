<?php

namespace App\Http\Controllers;

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

    // public function c

}
