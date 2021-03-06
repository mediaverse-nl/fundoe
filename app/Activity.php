<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Activity extends Model
{
    use Notifiable, SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = 'activity';

    public $timestamps = true;

    protected $fillable = [];

    protected $dates = [
        'start_datetime',
        'end_datetime',
    ];

    public function event()
    {
        return $this->hasMany('App\Event', 'activity_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review', 'activity_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function ableToOrderDate()
    {
        $time = Carbon::now()->addDays($this->daysBeforeClosing);

        return $time;
    }

    public function currentlyRunningEvents()
    {
        $from = $this->ableToOrderDate();

        return $this->event()
            ->whereDate('start_datetime', '>=', $from)
            ->count();
    }

    public function titleDash()
    {
        $string = strtolower($this->title);
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        $string = preg_replace("/[\s-]+/", " ", $string);
        $string = preg_replace("/[\s_]/", "-", $string);
        if (substr($string,-1) == '-'){
            $string = substr($string, 0, -1);
        }
        return $string;
    }

    public function images($amount = '*')
    {
        $images = [];

        if(!empty($this->img)){
            $i = 1;
            foreach (explode(',', $this->img) as $image) {
                if ($amount == '*'){
                    $images[] = $image;
                }elseif ($i <= $amount){
                    $images[] = $image;
                }
                $i++;
            }
        }else{
            $images = null;
        }

        return $images;
    }

    public function thumbnail()
    {
        return $this->images(1)[0];
    }

    public function getUrlTitleAttribute()
    {
        return str_replace('-', '-',  rtrim($this->title));
    }

    public function getActivityNameAttribute()
    {
        return "{$this->id} - {$this->title} - {$this->region}";
    }

    public function getCategoryAttribute()
    {
        return  $this->category_id;
    }

}
