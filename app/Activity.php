<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Activity extends Model
{
    use Notifiable;

    protected $primaryKey = 'id';

    protected $table = 'activity';

    public $timestamps = true;

    protected $fillable = [];
}
