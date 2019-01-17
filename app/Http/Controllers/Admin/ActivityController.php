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

    public function edit($id)
    {
        $activity = $this->activity->findOrFail($id);

        return view('admin.activity.edit')
            ->with('activity', $activity);
    }

    public function create()
    {
        return view('admin.activity.create');
    }

    public function store(Request $request)
    {
        dd($request->images);

        $activity = $this->activity;

        $activity->title = $request->title;
        $activity->description = $request->description;
        $activity->price = $request->price;
        $activity->region = $request->region;
        $activity->start_datetime = $request->start_datetime.':00' ;
        $activity->img = $request->images;
        $activity->save();

        //iamges display
//        if(!empty($request->images)){
//            foreach (explode(',', $activity->images) as $image){
//
//            }
//        }

        return redirect()->back();
    }
}
