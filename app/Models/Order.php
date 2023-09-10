<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'address_id', 'total_amount', 'status'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'full_address',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function  getFullAddressAttribute()
    {
        if($this->addresses){
            return $this->addresses?->state?->name .', '. $this->addresses?->address_line;
        } else{
            return "User Address is not available";
        }
    }

}
