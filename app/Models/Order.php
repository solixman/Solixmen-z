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
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function orderProducts(){
        return $this->hasmany(Order_product::class);
    }
    public function address(){
        return $this->belongsTo(Address::class);
    }

}
