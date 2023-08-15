<?php
// mvc done
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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
        return self::where('b_comp_ticket_date','>',Carbon::now())
            ->where('user_id', $userId)
            ->get();
            
    }

    public static function getCartItemForCurrentFoodItemAndUser($author_id,$itemId)
    {
        return self::where('user_id', $author_id)
            ->where('shopping_item_id', $itemId)
            ->first();
            
    }
}
