<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\repositories\RoleRepository;
use App\repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userRepository;
    private $roleRepository;
  
    public function __construct( UserRepository $userRepository,RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        try {
            $users = $this->userRepository->getAllUsers();

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
            $user = $this->userRepository->getOneUser($request['id']);
            $user->status = 'suspended';
            $this->userRepository->saveUser($user);
            return back()->with('success', "user suspended succesfully :(  ");
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

 
    public function profileAdmin(Request $request)
    {
        try {
            $user = $this->userRepository->getOneUser($request['id']);
            if ($user == null) {
                return back()->with('error', 'something went wrong');
            }
            $roles =$this->roleRepository->getAllRoles();
            return view('admin.partials.profile', compact('user', 'roles'));
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function Update(Request $request)
    {
       
    
        try {
            $fields = $request->validate([
               'firstName' =>'required|string|max:255',
               'lastName' =>'required|string|max:255',
               'role'=>'required|string|max:255',
               'email'=>'required|string|email|max:255',
               'status'=>'required|string|max:255',
            ]);

            $user = $this->userRepository->getOneUser($request['id']);

            if ($user->role->name != $fields['role'] && Auth::user()->role->name == 'Admin') {
                $role = $this->roleRepository->getRoleByName($fields['role']);
                $user->role_id = $role->id;
            }

            $user->firstName = $fields['firstName'];
            $user->lastName = $fields['lastName'];
            $user->bio = $request['bio'];
            $user->status = $request['status'];
            $user->phoneNumber = $request['phone'];
            $this->userRepository->saveUser($user);
            
             

            return back()->with('success', 'Personal Information Updated Succesfully');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
