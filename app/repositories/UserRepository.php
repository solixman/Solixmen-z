<?php

namespace App\repositories;

use App\Models\User;
use App\repositories\interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function saveUser(User $user)
    {
        return  $user->save();
    }

    public function getOneUser($id)
    {
        return User::find($id);
    }

    public function getAllUsers()
    {
        return User::paginate(10);
    }

    public function getTop5()
    {
        return User::withCount('orders')
            ->orderBy('orders_count', 'desc')
            ->take(5)->get();
    }
    public function getActiveCustomersCount()
    {
        return User::join('orders','orders.user_id','users.id')
        ->where('orders.status','paid')
        ->orWhere('orders.status','shipped')
        ->orWhere('orders.status','delivered')
        ->select('users.id')->groupBy('users.id')
        ->get()->count();
    }
}
