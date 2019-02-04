<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Event;
use App\Http\Requests\Admin\EventStoreRequest;
use App\Http\Requests\Admin\EventUpdateRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    protected $event;
    protected $activity;

    public function __construct(Event $event, Activity $activity)
    {
        $this->event = $event;
        $this->activity = $activity;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = $this->event->get();

        return view('admin.event.index')
            ->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request)
    {
        $event = $this->event;

        $event->activity_id = $request->activity;
        $event->start_datetime = $request->start_datetime;
        $event->end_datetime = Carbon::parse($request->start_datetime)
            ->addMinutes($request->duration);
        $event->price = $request->price;
        $event->target_group = $request->target_group;
        $event->status = $request->status;

        $event->save();

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = $this->event->findOrFail($id);
        $activities = $this->activity->get();

        return view('admin.event.edit')
            ->with('activities', $activities)
            ->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, $id)
    {
        $event = $this->event->findOrFail($id);

        $event->activity_id = $request->activity;
        $event->start_datetime = $request->start_datetime;
        $event->end_datetime = Carbon::parse($request->start_datetime)
            ->addMinutes($request->duration);
        $event->price = $request->price;
        $event->target_group = $request->target_group;
        $event->status = $request->status;

        $event->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
