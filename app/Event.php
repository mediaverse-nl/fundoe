<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    use Notifiable;

    protected $primaryKey = 'id';

    protected $table = 'event';

    public $timestamps = true;

    protected $fillable = ['start_datetime', 'end_datetime'];

    protected $dates = ['start_datetime',
        'end_datetime','created_at', 'updated_at', 'deleted_at'];

    public function activity()
    {
        return $this->belongsTo('App\Activity');
    }

    public function diffInTime()
    {
        return $this->start_datetime
            ->diffInMinutes($this->end_datetime);
    }

    public function startToEnd($format_start = 'd M Y - H:m', $format_end = 'H:m')
    {
        return $this->startDatetime($format_start)
            .' t/m '
            .$this->endDatetime($format_end);
    }

    public function startDatetime($format = 'd M Y - H:m')
    {
        return $this->start_datetime->format($format);
    }

    public function endDatetime($format = 'd M Y - H:m')
    {
        return $this->end_datetime->format($format);
    }

    public function remainingTimeToStart($extent = 'nog @number dagen')
    {
        //todo nog afmaken extent moet dagen en tekst aanpassen
        if ($this->start_datetime->diffInDays() <= 1){
            $diff = $this->start_datetime->diffInHours();
        }elseif ($this->start_datetime->diffInHours()){
            $diff = $this->start_datetime->diffInHours();
        }else{
            $diff = $this->start_datetime->diffInMinutes();
        }

        return str_replace('@number', $diff, $extent);
    }

}
