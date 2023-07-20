<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingItem extends Model
{
    use HasFactory;

    protected $table = 'shopping_items';

    protected $fillable = [
        'name',
        'price',
    ];

public function cartItems()
{
    return $this->belongsToMany(User::class, 'cart_items')
                ->withPivot('quantity')
                ->withTimestamps();
}

}

