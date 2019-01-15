<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
//    use Notifiable;

    protected $table = 'order';

    public $timestamps = true;

    protected $fillable = [];

    protected $dates = ['created_at', 'updated_at'];
}
