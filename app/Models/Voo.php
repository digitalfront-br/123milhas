<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cia',
        'fare',
        'flightNumber',
        'origin',
        'destination',
        'departureDate',
        'arrivalDate',
        'departureTime',
        'arrivalTime',
        'classService',
        'price',
        'tax',
        'outbound',
        'inbound',
        'duration',
    ];

    public $timestamps = false;
}
