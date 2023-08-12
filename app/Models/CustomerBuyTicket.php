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

    public static function getAllTicketsSoldByTheCompanyID($author_id)
    {
        return self::where('bus_comp_id', $author_id)
            ->get();
    }

    public static function deleteCustomerBuyTicketById($customer_bought_ticketId)
    {
        self::where('id', $customer_bought_ticketId)->delete();
    }
   
}
