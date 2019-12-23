<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use Sluggable;

    protected $fillable = ['image_name', 'image_url', 'category', 'uploaded_by'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'image_name'
            ]
        ];
    }
}
