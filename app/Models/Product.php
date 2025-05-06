<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable= [
        'name',
        'price',
        'image',
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

public function images(){
    return $this->hasMany(Image::class);
}

}
