<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table="notifications";
    use HasFactory;

    protected $fillable = [
        
        'id',
        'ticket(s)',
        'from',
        'to',
        'author_name',
        'date',
    ];



}
