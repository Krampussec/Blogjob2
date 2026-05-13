<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'category_id', 'thumbnail', 'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getImage()
{
    return $this->thumbnail
        ? asset('uploads/thumbnails/' . $this->thumbnail)
        : asset('no-image.png');
}

    public static function uploadImage(Request $request, $image = null){
        if($request->hasFile('thumbnail')){
            if ($image){
                Storage::disk('public')->delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store("images/{$folder}", 'public');
        }
        return null;
    }
}
