<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Define relationships, for example, with the User model if products are associated with users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define relationships with the Cart model if products can be added to a shopping cart
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderproduct()
    {
        return $this->hasMany(order_product::class,'id','product_id');
    }
    public function rate()
    {
        return $this->hasMany(rates::class,'product_id','id');
    }
    public function discounts()
    {
        return $this->hasOne(discount::class);
    }
    public function payment()
    {
        return $this->belongsTo(payment::class,'id','product_id');
    }

  
    public function scopeSearch($query, $value){
        $query->where('name','like',"%{$value}%");
    }

    protected $table = 'products'; // Specify the table name if it's different from the default naming convention
}

