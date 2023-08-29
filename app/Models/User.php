<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'gender',
        'status',
        'profile_photo_path',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'image',
        'full_address',
    ];

    /**
     * The function that are make relationship between user and user news feed.
     *
     * @method
     */
    public function  getImageAttribute()
    {
        $image =  $this->profile_photo_path;
        if (!$image || $image == "0") {
            return '/storage/users/1.jpg';
        } else {
            return '/storage/users/'.$image;
        }
    }

    public function  getFullAddressAttribute()
    {
        if($this->addresses){
            return $this->addresses?->state?->name .', '. $this->addresses?->address_line;
        } else{
            return "User Address is not available";
        }
    }

    public function addresses()
    {
        return $this->hasOne(Address::class)->select('id', 'post_code', 'address_line', 'state_id');;
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItems::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
