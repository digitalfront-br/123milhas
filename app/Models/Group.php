<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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

    protected $primaryKey = 'uniqueId';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Group $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }

    public function inbound()
    {
        return $this->hasMany(Voo::class, 'inbound', 'inbound_id');
    }

    public function outbound()
    {
        return $this->hasMany(Voo::class, 'outbound', 'outbound_id');
    }
}
