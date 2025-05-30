<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'title',
        'author',
        'image',
        'description',
        'category_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public static function factory()
    {
        return \Database\Factories\BlogFactory::new();
    }
}
