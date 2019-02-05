<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        dd(1);

        return [
            'activity' => 'required',
            'start_datetime' => 'required|date|after:today',
            'duration' => 'required|numeric',
            'price' => 'required',
            'target_group' => 'required|in:'.implode(',',\App\Event::getTargetGroup()),
        ];
    }
}
