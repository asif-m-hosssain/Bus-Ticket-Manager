<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBuyTicket extends Model
{
    protected $table="customer_bought_ticket";

    public static function getCustomerTicketsByID($userId)
    {
        return self::where('customer_id', $userId)
            ->get();
    }
   
}
