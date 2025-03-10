<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable=[
        'cat_name',
        'description'
    ];

    public function dishes(){
        return $this->hasMany(Dish::class);
    }
}
