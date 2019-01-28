<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class GroupOrderStoreRequest extends FormRequest
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
        Session::flash('id', (int)$this->request->get('id'));
        Session::flash('activityType', 'group');

        return [
            'duur' => 'required',
            'tickets' => 'required',
            'activiteit_datum' => 'required',
        ];
    }
}
