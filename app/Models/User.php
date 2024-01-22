<?php
namespace App\Models;
use App\Models\friends;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\messages;
use App\Models\Painter;
use App\Models\Post;
use App\Models\Product;
use App\Models\Like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class User extends Model implements Authenticatable
{
    use HasFactory,HasApiTokens,AuthenticatableTrait, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'userimg',
        'role',
        'id',
        'remember_token',
        'verification_token',
        'is_verified',
        'status',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        
    ];


    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
    public function userinfo()
    {
        return $this->hasOne(userinfo::class);
    }
    public function frindes(): HasMany
    {
        return $this->hasMany(friends::class);
    }
    public function friends()
    {
        return $this->hasMany(friends::class, 'user_id');
    }
   
    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'likes');
    }
   public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,'id','user_id');
    }


    
    public function attendedEvents(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'user_id', 'id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function orders()
    {
        return $this->hasMany(orders::class,'id','user_id');
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Painter::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(messages::class);
    }

    public function painters(): HasMany
    {
        return $this->hasMany(Painter::class);
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function rates()
    {
        return $this->hasMany(rates::class,'user_id','id');
    }
   

    public function payment()
    {
        return $this->belongsTo(payment::class,'id','user_id');
    }
    public function userevents(): HasMany
    {
        return $this->hasMany(eventusers::class);
    }
    public function scopeSearch($query, $value){
        $query->where('name','like',"%{$value}%")->orWhere('email','like',"%{$value}%");
    }
}
