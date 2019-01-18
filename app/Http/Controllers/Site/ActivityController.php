<?php

namespace App\Http\Controllers\Site;

use App\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    protected $activity;

    public function __construct(Activity $activity)
    {
        $this->activity = $activity;
    }

    public function show($id, $title = null)
    {
        $activity = $this->activity->findOrFail($id);

        return view('site.activity.show')
            ->with('activity', $activity);
    }


}
