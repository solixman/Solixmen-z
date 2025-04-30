<?php

namespace App\repositories;

use App\Models\User;
use App\repositories\interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface{

public function saveUser(User $user){
   return  $user->save();
}

public function getOneUser($id){
    return User::find($id);
}

public function getAllUsers(){
    return User::paginate(10);
}


}
