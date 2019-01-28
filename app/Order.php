<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
//    use Notifiable;

    protected $table = 'order';

    public $timestamps = true;

    protected $fillable = ['payment_id'];

    protected $dates = ['created_at', 'updated_at'];

    public function event()
    {
        return $this->belongsTo('App\Event', 'event_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
