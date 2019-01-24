<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    protected $category;
    protected $event;

    public function __construct(Category $category, Event $event)
    {
        $this->category = $category;
        $this->event = $event;
    }

    public function show($id)
    {
        $category = $this->category->findOrFail($id);
        $categories = $this->category->get();
        $from = $this->event->ableToOrderDate();
        $baseActivity = $category->activities()->get();

        $baseEvents = $this->event
            ->whereHas('activity', function ($q) use ($category) {
                $q->where('category_id', '=', $category->id);
            })
            ->whereDate('start_datetime', '>=', $from)
            ->orderBy('start_datetime', 'asc');

        $events = $this->event
            ->whereHas('activity', function ($q) use ($category) {
                $q->where('category_id', '=', $category->id);
            })
            ->reviewRating(Input::get('rating'))
            ->whereDate('start_datetime', '>=', $from)
            ->orderBy('start_datetime', 'asc')
            ->where(function ($q){
                if(Input::has('groep') && Input::get('groep') !== null){
                    $i = 1;
                    foreach (Input::get('groep') as $i){
                        if ($i == 1){
                            $q->where('target_group', '=', $i);
                        } else{
                            $q->orWhere('target_group', '=', $i);
                        }
                        $i++;
                    }
                }
            })
            ->get();

        return view('site.category.show')
            ->with('baseActivity', $baseActivity)
            ->with('baseEvents', $baseEvents)
            ->with('events', $events)
            ->with('categories', $categories)
            ->with('category', $category);
    }
}
