<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Event;
use App\Http\Requests\Admin\EventStoreRequest;
use App\Http\Requests\Admin\EventUpdateRequest;
//use Carbon\Carbon;
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
        $events = $this->event
            ->orderBy('start_datetime','desc')
            ->get();

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
        $activities = $this->activity->get();

        return view('admin.event.create')
            ->with('activities', $activities);    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request)
    {
        $datetime = $request->start_datetime.':00';
        $end_datetime = Carbon::createFromFormat('Y-m-d H:i:s', $datetime)
            ->addMinutes($request->duration)
            ->format('Y-m-d H:i:s');

        $start_datetime = Carbon::createFromFormat('Y-m-d H:i', $request->start_datetime)
            ->format('Y-m-d H:i:s');

        $event = $this->event;

        $event->activity_id = $request->activity;
        $event->start_datetime = $start_datetime;
        $event->end_datetime = $end_datetime;
        $event->price = $request->price;
        $event->target_group = $request->target_group;
//        $event->status = $request->status;

        $event->save();

        return redirect()->route('admin.event.edit', $event->id);
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
        $datetime = $request->start_datetime.':00';
        $end_datetime = Carbon::createFromFormat('Y-m-d H:i:s', $datetime)
            ->addMinutes($request->duration)
            ->format('Y-m-d H:i:s');

        $start_datetime = Carbon::createFromFormat('Y-m-d H:i', $request->start_datetime)
            ->format('Y-m-d H:i:s');

        $event = $this->event->findOrFail($id);

        $event->activity_id = $request->activity;
        $event->start_datetime = $start_datetime;
        $event->end_datetime = $end_datetime;
        $event->price = $request->price;
        $event->target_group = $request->target_group;
//        $event->status = $request->status;

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
