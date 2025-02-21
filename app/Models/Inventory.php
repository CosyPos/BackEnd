<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    /** @use HasFactory<\Database\Factories\InventoryFactory> */
    use HasFactory;

    protected $fillable = [
        'dish_id',
        'quantity',
        'availability'
    ];

    public function dish(){
        return $this->belongsTo(Dish::class);
    }
}
