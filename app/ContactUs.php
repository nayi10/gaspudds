<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ContactUs extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'content', 'username'];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getTitle()
    {
        return $this->title;
    }
}
