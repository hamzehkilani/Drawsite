<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $guarded = [
      
    ];
    public function product()
    {
        return $this->belongsTo(product::class,'product_id','id');
    }

    public function user()
    {
        return $this->belongsTo(user::class,'user_id','id');
    }
    public function scopeSearch($query, $value)
    {
        $query->orWhereHas('user', function ($autherQuery) use ($value) {
            $autherQuery->where('name', 'like', "%{$value}%");
        })->orWhereHas('book', function ($autherQuery) use ($value) {
            $autherQuery->where('name', 'like', "%{$value}%");
        });
    }

}
