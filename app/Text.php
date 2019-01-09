<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'text';

    public $timestamps = false;

    protected $fillable = ['key_name', 'text_type', 'option', 'text'];

    protected $casts = [
        'options' => 'array',
    ];

    public function options()
    {
        $keys = '';
        $mentions = json_decode($this->option, true);

        if(isset($mentions)){
            $keys .= '[';
            foreach ($mentions['mentions'] as $key => $v){
                $keys .= '"'.$key.'",';
            }
            $keys .= ']';
        }

        return $keys;
    }
}
