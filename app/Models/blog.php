<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
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
}
