<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'tags'];

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
            return '/storage/users/1.jpg';
        } else {
            return $image;
        }
    }

}
