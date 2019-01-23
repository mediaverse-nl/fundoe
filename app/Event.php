<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    use Notifiable;

    protected $primaryKey = 'id';

    protected $table = 'event';

    protected $daysBeforeClosing = 2;

    public $timestamps = true;

    protected $fillable = ['start_datetime', 'end_datetime'];

    protected $dates = ['start_datetime', 'end_datetime', 'created_at', 'updated_at', 'deleted_at'];

    public function activity()
    {
        return $this->belongsTo('App\Activity', 'activity_id', 'id');
    }

    public function diffInTime()
    {
        return $this->start_datetime
            ->diffInMinutes($this->end_datetime);
    }

    public function timeToOrder()
    {
        $time = $this->start_datetime->addDays(-(int)$this->daysBeforeClosing);

        return $time;
    }

    public function ableToOrderDate()
    {
        $time = Carbon::now()->addDays($this->daysBeforeClosing);

        return $time;
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

    public function remainingTimeToStart($extent = 'nog @number @factor')
    {
        if ($this->start_datetime->diffInDays() >= 1)
        {
            $extent = str_replace('@factor', 'dagen', $extent);
            $diff = $this->start_datetime->diffInDays();
        }elseif ($this->start_datetime->diffInHours() < 24)
        {
            $extent = str_replace('@factor', 'huren', $extent);
            $diff = $this->start_datetime->diffInHours();
        }elseif ($this->start_datetime->diffInMinutes() < 60)
        {
            $extent = str_replace('@factor', 'min', $extent);
            $diff = $this->start_datetime->diffInMinutes();
        }

        return str_replace('@number', $diff, $extent);
    }

    public static function getTargetGroup()
    {
        return collect(['kinderen', 'tieners', 'jongvolwassenen', 'volwassenen', 'ouderen', 'stelletjes', 'iedereen'])->toArray();
    }

}
