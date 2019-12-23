<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class LearningMaterial extends Model
{
    use Sluggable;
    
    protected $fillable = ['title', 'document_url', 'category', 'uploaded_by'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
