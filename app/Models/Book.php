<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'price',
        'category_id',
        'image'
    ];

    // A book belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // A book may appear in many order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
