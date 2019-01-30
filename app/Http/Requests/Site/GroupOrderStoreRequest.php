<?php

namespace App\Http\Requests\Site;

use App\Event;
use Carbon\Carbon;
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

        $event = Event::findOrFail($this->request->get('id'));

        $afterDate = Carbon::now()->addHours(48);

        return [
            'id' => 'required|integer',
            'voorwaarden' => 'accepted',
            'duur' => 'required|numeric|in:'.implode(',', $event->groupDurationSelection()),
            'tickets' => 'required|numeric|in:'.implode(',', $event->groupTicketSelection()),
            'activiteit_datum' => 'required|date|after:'.$afterDate,
        ];
    }
}
