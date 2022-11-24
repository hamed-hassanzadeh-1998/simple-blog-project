<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'path'];
    protected $uploads = '/images/';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getPathAttribute($photo)
    {
        return $this->uploads.$photo;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
