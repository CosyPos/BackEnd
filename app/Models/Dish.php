<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    /** @use HasFactory<\Database\Factories\DishFactory> */
    use HasFactory;

    protected $fillable = [
        'dish_name',
        'price',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
