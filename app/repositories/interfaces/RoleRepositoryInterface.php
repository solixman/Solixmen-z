<?php

namespace App\repositories\interfaces;


use App\Models\Role;

interface RoleRepositoryInterface{

    public function getAllRoles();
    public function getRoleByName($roleName);
}