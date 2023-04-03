<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'price',
        'discount',
        'quantity',
        'all_details',
        'sub_category_id',
        'tags',
        'hot_offer',
        'feature',
        'status',
        'views',
    ];

        /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'image',
    ];




    /**
     * The function that are make relationship between user and user news feed.
     *
     * @method
     */
    public function  getImageAttribute()
    {
        $image =  $this->product_images()->first();
        if ($image) {
            return $image->image_url;
        } else {
            return '/storage/productImages/1.jpg';
        }
    }


    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_sizes');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function wishlists()
    {
        return $this->belongsToMany(User::class, 'wishlist', 'product_id', 'user_id')
                    ->withTimestamps();
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
