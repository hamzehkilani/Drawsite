<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    use HasFactory;
    protected $guarded = [];
public function products(){
    $this->belongsTo(Product::class);
}
public function cart(){
    $this->hasMany(cart::class,'product_id','product_id');
}
protected $table = 'discounts';


}
