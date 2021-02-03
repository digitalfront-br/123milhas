<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'totalPrice',
        'uniqueId',
        'outbound_id',
        'inbound_id'
    ];

    public $timestamps = false;

    protected $primaryKey = 'uniqueId';

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }
}
