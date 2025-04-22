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
    return $this->belongsto(Categorie::class);
}
public function order_products(){
    return $this->hasMany(Order_product::class);
}

}
