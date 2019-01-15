<?php

namespace App\Http\Controllers\Admin;

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

    public function index()
    {
        $activities = $this->activity->get();

        return view('admin.activity.index')
            ->with('activities', $activities);
    }
}
