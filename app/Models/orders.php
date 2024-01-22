<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $guarded = [];
 public function user(){
    $this->belongsTo(User::class,'user_id','id');
 }
 public function orderproducts(){
    $this->hasMany(order_product::class,'id','order_id');
 }
}
