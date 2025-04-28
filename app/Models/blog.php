<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'author',
        'image',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function factory()
    {
        return \Database\Factories\BlogFactory::new(); // Custom factory
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
