<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'orderDate',
        'status',
        'tax',
        'shipping'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function order_products(){
        return $this->hasmany(Order_product::class);
    }
    public function address(){
        return $this->belongsTo(Address::class);
    }

}
