<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;



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

}
