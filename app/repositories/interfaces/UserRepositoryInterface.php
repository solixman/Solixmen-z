<?php
namespace App\repositories\interfaces;

use App\Models\User;

Interface UserRepositoryInterface {


    public function saveUser(User $user);
    public function getOneUser($id);
    public function getAllUsers();
}