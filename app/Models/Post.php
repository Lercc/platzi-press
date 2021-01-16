<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use Sluggable;
    use HasFactory;

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

    protected $fillable = [
        'user_id',
        'title',
        'image',
        'body',
        'iframe',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyResumeAttribute()
    {
        return substr($this->body, 0, 140);
    }

    public function getImageSourceAttribute ()
    {
        if ($this->image) {
            return url("storage/$this->image");
        }
    }
}
