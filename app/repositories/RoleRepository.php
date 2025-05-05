<?php

namespace App\repositories;

use App\Models\Role;
use App\repositories\interfaces\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{

    public function getAllRoles(){
        return Role::All();
    }
    public function getRoleByName($roleName){
        return Role::where('name', $roleName)->first();
    }
}



?>