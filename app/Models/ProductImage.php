<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'image'];

    protected $appends = [
        'image_url'
    ];

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return '/storage/productImages/1.jpg';
        } else {
           return '/storage/productImages/' . $this->image;
        }
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
