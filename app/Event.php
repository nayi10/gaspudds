<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = ['id', 'views', 'created_at', 'updated_at'];

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function publisher()
    {
        return $this->belongsTo('App\User');
    }
}
