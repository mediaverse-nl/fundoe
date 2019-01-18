<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

//        $category->activities
        $events = $this->event->whereHas('activity', function ($q) use ($category) {
            $q->where('category_id', '=', $category->id);
        })->get();

        return view('site.category.show')
            ->with('events', $events)
            ->with('category', $category);
    }
}
