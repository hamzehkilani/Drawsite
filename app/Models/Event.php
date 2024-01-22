<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Define the relationship with the User model (assuming events are created by users)
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function userevents(): HasMany
    {
        return $this->hasMany(eventusers::class);
    }

    public function scopeSearch($query, $value){
        $query->where('title','like',"%{$value}%")->orWhere('location','like',"%{$value}%");
    }
    protected $table = 'events'; 
}

