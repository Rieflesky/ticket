<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'serial_number',
        'ticket_type',
        'quantity',
        'purchase_date',
        'validity_start',
        'validity_end',
        'status',
        'price',
        'payment_status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

