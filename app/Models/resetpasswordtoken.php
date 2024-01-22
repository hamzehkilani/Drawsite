<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resetpasswordtoken extends Model
{
    use HasFactory;
    protected $table = 'password_reset_tokens';

    protected $guarded = [];

    public function user(){
        $this->belongsTo(user::class);
    }
}
