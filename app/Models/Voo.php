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
        'group_id',
    ];

    public $timestamps = false;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
