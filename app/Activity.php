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

    public function getImages()
    {
        $images = [];

        if(!empty($this->img)){
            foreach (explode(',', $this->img) as $image){
                $images[] = $image;
            }
        }else{
            $images = null;
        }

        return $images;
    }

}
