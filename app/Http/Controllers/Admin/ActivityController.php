<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Http\Requests\Admin\ActivityStoreRequest;
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
        $activities = $this->activity
            ->withTrashed()
            ->get();

        return view('admin.activity.index')
            ->with('activities', $activities);
    }

    public function edit($id)
    {
        $activity = $this->activity
            ->withTrashed()
            ->findOrFail($id);

        return view('admin.activity.edit')
            ->with('activity', $activity);
    }

    public function create()
    {
        return view('admin.activity.create');
    }

    public function store(ActivityStoreRequest $request)
    {
        $activity = $this->activity;

        $activity->title = $request->title;
        $activity->category_id = $request->category;
        $activity->description = $request->description;
        $activity->price_per_hour = $request->price_per_hour;
        $activity->max_number_of_people = $request->max_number_of_people;
        $activity->min_number_of_people = $request->min_number_of_people;
        $activity->min_duration = $request->min_duration;
        $activity->region = $request->region;
        $activity->location = $request->location;
        $activity->img = $request->images;

        $activity->save();

        return redirect()->route('admin.activity.edit', $activity->id);
    }


    public function update(Request $request, $id)
    {
        $activity = $this->activity
            ->withTrashed()
            ->findOrFail($id);

        $activity->title = $request->title;
        $activity->category_id = $request->category;
        $activity->description = $request->description;
        $activity->price_per_hour = $request->price_per_hour;
        $activity->max_number_of_people = $request->max_number_of_people;
        $activity->min_number_of_people = $request->min_number_of_people;
        $activity->min_duration = $request->min_duration;
        $activity->region = $request->region;
        $activity->location = $request->location;
        $activity->img = $request->images;

        $activity->save();

        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $activity = $this->activity
            ->withTrashed()
            ->findOrFail($id);

        if ($activity->trashed()){
            $activity->restore();
        }else{
            $activity->delete();
        }

        return redirect()
            ->route('admin.activity.index');
    }
}
