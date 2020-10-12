<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'body',
        'iframe',
        'image',
        'user_id',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // get_excerpt Getting the extract
    public function getGetExcerptAttribute()
    {
        return substr($this->body, 0, 140);
    }

    // Is the {{ $post->get_image }} wrote in posts.blade.php line 11
    public function getGetImageAttribute()
    {
        if($this->image){
            // folder storage is a private folder of the framework, so we need to ask access
            // whit comand in console: php artisan storage:link
            // Its create a symbolic link in our public folder
            return url("storage/$this->image");
        }
    }
}
