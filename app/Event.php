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

    public function orders()
    {
        return $this->hasMany('App\Order', 'event_id', 'id');
    }

    public function publicTicketSelection()
    {
        $soldTickets = $this->orders()
            ->where('status', '=', 'paid')
            ->sum('ticket_amount');

        if ($soldTickets == $this->activity->max_number_of_people){
            return ['uitverkocht' => 'uitverkocht'];
        }

        $ticketsLeft = $this->activity->max_number_of_people - $soldTickets;

        return range(1, $ticketsLeft);
    }

    public function groupTicketSelection()
    {
        return range($this->activity->min_number_of_people, $this->activity->max_number_of_people,2);
    }

    public function groupDurationSelection()
    {
        return range($this->activity->min_duration, 480,15);
    }

    public function scopeReviewRating($q, $input)
    {
        if ($input){
            $input = explode(',', $input);
        }

        $min = $input ? $input[0] : null;
        $max = $input ? $input[1] : null;

        if ($min || $max){
//            return $q->whereHas('activity.reviews', function ($q) use ($min, $max) {
//                $q->where('rating','>=',0);
//                $q->where('rating','<=',5);
//            });
            $q->whereHas('activity.reviews', function($q) use ($min, $max) {
                $q->havingRaw('AVG(rating) >= ?', [$min])
                    ->havingRaw('AVG(rating) <= ?', [$max]);
            });
//                $q->having('event.activity.review', '>=', [$min]);
//            $q->having('event.activity.review', '<=', [$max]);
//            $q->having('AVG(event.activity.review) <= ', [$max]);
        }


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
        return collect(['kinderen' => 'kinderen', 'tieners' => 'tieners', 'jongvolwassenen' => 'jongvolwassenen', 'volwassenen' => 'volwassenen', 'ouderen' => 'ouderen', 'stelletjes' => 'stelletjes', 'iedereen' => 'iedereen'])->toArray();
    }

}
