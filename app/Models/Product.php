<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable= [
        'titre',
        'image',
        'type',
        'price',
        'quantity',
        'description'
    ];

public function admin(){
    return $this->belongsto(User::class);
}

public function categorie(){
    return $this->hasone(Categorie::class);
}
public function orderProducts(){
    return $this->hasmany(OrderProduct::class);
}

}
