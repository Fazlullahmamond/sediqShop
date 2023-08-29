<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'category_id'];
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'image_url',
    ];

    /**
     * The function that are make relationship between user and user news feed.
     *
     * @method
     */
    public function  getImageUrlAttribute()
    {
        $image =  $this->image;
        if (!$image || $image == "0") {
            return '/storage/productImages/1.jpg';
        } else {
            return '/storage/images/subcategories/'.$this->image;
        }
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }


}
