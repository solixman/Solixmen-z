<?php

namespace App\repositories;

use App\Models\Address;
use App\repositories\interfaces\AddressRepositoryInterface;


class AddressRepository implements AddressRepositoryInterface{


    public function saveAddress(Address $address){
        return $address->save();
    }
}