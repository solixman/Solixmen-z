<?php

namespace App\repositories\interfaces;
use App\Models\Address;

interface AddressRepositoryInterface{
    public function saveAddress(Address $address);
}