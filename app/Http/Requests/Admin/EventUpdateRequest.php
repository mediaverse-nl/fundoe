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
        return [
            'activity' => 'required',
            'start_datetime' => 'required|date|after:today',
            'end_datetime' => 'required|date|after:start_datetime',
            'price' => 'required',
            'target_group' => 'required|in:'.implode(',',\App\Event::getTargetGroup()),
        ];
    }
}
