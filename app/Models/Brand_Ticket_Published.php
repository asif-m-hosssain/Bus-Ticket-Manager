<?php
// mvc done
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Brand_Ticket_Published extends Model
{
    use HasFactory;

    protected $table = "bus_company_published_ticket";
    public $timestamps = false;

    protected $fillable = [
        'b_comp_ticket_author_id', // Add other fillable fields here
        'b_comp_ticket_from',
        'b_comp_ticket_to',
        'b_comp_ticket_seat',
        'b_comp_ticket_date',
        'b_comp_ticket_price',
        'b_comp_ticket_author_name',
        'all_seats',
        'empty_seats',
        'created_at', 
        'updated_at'
    ];
    
    public static function getActiveTicketsForAuthor($authorId)
    {
        return self::where('b_comp_ticket_author_id', $authorId)
            ->where('b_comp_ticket_date', '>', Carbon::now())
            ->where('b_comp_ticket_seat', '>', 0)
            ->get();
    }


    public static function createTicket(array $ticketData)
    {
        $ticketData['all_seats'] = self::serializeSeats(range(1, $ticketData['b_comp_ticket_seat']));
        $ticketData['empty_seats'] = self::serializeSeats(array_fill(1, $ticketData['b_comp_ticket_seat'], false));

        return self::create($ticketData);
    }

    private static function serializeSeats($seats)
    {
        return serialize($seats);
    }


    // Delete ticket by ID
    public static function deleteTicketById($ticketId)
    {
        
        self::where('id', $ticketId)->delete();
    }




}
