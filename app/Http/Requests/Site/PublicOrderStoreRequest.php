<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class PublicOrderStoreRequest extends FormRequest
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

        return [
            'tickets' => 'required|min:1',
            'voorwaarden' => 'accepted',
            'id' => 'required'
        ];
    }
}
