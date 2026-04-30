<?php

namespace App\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function category(){
        return $this->belongsToMany(Tag::class);
    }

    public function sluggable():array{
        return [
            "slug"=> [
                "source"=> "title",
            ]
        ];
    }
}
