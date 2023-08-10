<?php
// mvc done
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingItem extends Model
{
    use HasFactory;

    protected $table = 'shopping_items';
    protected $primaryKey = 'item_id'; //Specifying the primary key column (for cart info display implementaion )

    protected $fillable = [
        'name',
        'price',
        'ticket_id',
        'bus_comp_id',
        'bus_comp_name',
    ];

    public function cartItems()
    {
        return $this->belongsToMany(User::class, 'cart_items', 'shopping_item_id', 'user_id') // Defining relationship [necessary for pushing pull data from other tables]
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

}

