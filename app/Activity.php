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

    protected $dates = [
        'start_datetime',
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
}
