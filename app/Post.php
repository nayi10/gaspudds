<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'content', 'author', 'promo_status'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
            ];
    }

    public function author()
    {
        return $this->belongsTo('App\User');
    }
}
