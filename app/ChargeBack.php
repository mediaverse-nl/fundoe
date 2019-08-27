<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChargeBack extends Model
{
    protected $table = 'charge_back';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'name',
        'administration_costs',
        'total_refund_amount',
        'iban',
        'status'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
