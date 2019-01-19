<?php

namespace App\Http\Controllers\Site;

use App\Activity;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    protected $activity;
    protected $event;

    public function __construct(Activity $activity, Event $event)
    {
        $this->activity = $activity;
        $this->event = $event;
    }

    public function show($title = null, $id)
    {
        $event = $this->event->findOrFail($id);

        return view('site.activity.show')
            ->with('event', $event);
    }


}
