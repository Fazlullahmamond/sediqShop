<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image'];

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
            return '/storage/images/categories/'.$this->image;
        }
    }

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
    
}
