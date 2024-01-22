<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Painter extends Model
{
    use HasFactory;

    protected $guarded = [];


    // Define relationships, for example, with the User model (if applicable)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $value){
        $query->where('name','like',"%{$value}%")->orwhere('email','like',"%{$value}%");
    }

    protected $table = 'painters'; // Specify the table name if it's different from the default naming convention
}

