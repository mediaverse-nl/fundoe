<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('Editor')) {

    /**
     * description
     *
     * @param richtext  / richtext  / text
     * @return
     */
    function Editor($key, $textType = false, $hideEditorBtn = false, $value = false, $options = null)
    {
        $text = new \App\Text();

        $editor = $text->where('key_name',  '=', $key);
        $text = $editor->first();
        $textType ? $textType : 'text';

//        dd($text->text);
        $editor->updateOrCreate (['key_name' => $key], [
            'key_name' => $key,
            'text_type' => $textType,
            'option' => json_encode($options),
            'text' => $editor->count() == 1 ? $text->text : ($value ? : ''),
        ]);

        if(Auth::check() && $hideEditorBtn == false){
            return view('components.admin-text-tool')
                ->with('text', $text);
        }

        if (isset($options)) {
            foreach ($options['mentions'] as $key => $v) {
                dd($key, $v);
                $text = str_replace('@'.$key, $v, $text);
            }
        }

        return $text;
    }
}
