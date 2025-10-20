<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    protected $fillable = [
        'title',
        'author',
        'category_id',
        'description',
        'price',
        'cover_image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
