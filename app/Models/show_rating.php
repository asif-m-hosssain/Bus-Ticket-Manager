<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class show_rating extends Model
{
    use HasFactory;
    protected $table="ratings";
    protected $fillable = [
        'bus_comp_id', // Add other fillable fields here
        'customer_id',
        'review',
        'rating',
        
        'company_name',
        'customer_name'
    ];

    public static function getRatingandReviewforAComapny($company_id_to_show_rating)
    {
        return self::where('bus_comp_id', $company_id_to_show_rating)
            ->get();
    }
}
