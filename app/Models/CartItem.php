<?php
// mvc done
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table="cart_items";
    // use HasFactory;

    public function shoppingItem()
    {
        return $this->belongsTo(ShoppingItem::class, 'shopping_item_id');
    }

    public static function fetch_cart_items($userId)
    {
        return self::where('user_id', $userId)
            ->get();
            
    }
}
