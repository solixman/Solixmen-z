<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable= [
        'name',
        'image',
        'price',
        'type',
        'quantity',
        'description'
    ];


public function categorie(){
    return $this->belongsto(Categorie::class);
}
public function order_products(){
    return $this->hasMany(Order_product::class);
}

}
