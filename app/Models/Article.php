<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Article extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;



    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'published_at' => 'date',
        'meta' => 'array'
    ];

    public function createdByUser()
    {
        // return $this->belongsTo(User::class, 'created_by_user_id');
        // return $this->belongsTo(User::class, 'user_id'); user id si puo omettere perche e' di default in laravel 
        return $this->belongsTo(User::class, 'user_id');
    }


    public function registerMediaCollections() : void
    {
        $this->addMediaCollection('gallery');
    }


    public function registerMediaConversions(Media $media = null) : void 
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(200)
            ->sharpen(10);

        $this->addMediaConversion('mini')
            ->width(80)
            ->height(80)
            ->sharpen(10);
    }

}
