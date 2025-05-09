<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'country',
        'region',
        'city',
        'streetAddress',
        'zipCode',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
