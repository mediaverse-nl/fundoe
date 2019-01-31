<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    use SEOTools;

    protected $event;
    protected $category;

    public function __construct(Event $event, Category $category)
    {
        $this->event = $event;
        $this->category = $category;
    }

    public function __invoke()
    {
        //default seo
        $this->seo()
            ->setTitle(Editor('seo_title', 'text', true, '').' | fundoe.nl')
            ->setDescription(Editor('seo_description', 'text', true, ''));
        //opengraph
        $this->seo()
            ->opengraph()
            ->setUrl(url()->current())
            ->addProperty('type', 'website');
        //twitter
        $this->seo()->twitter()
            ->setSite(Editor('seo_twitter_username', 'text', true, '@username'));

        $categories = $this->category->get();
        $from = $this->event->ableToOrderDate();

        $events = $this->event
            ->whereDate('start_datetime', '>=', $from)
            ->orderBy('start_datetime', 'asc');


        $bestSoldEvent = $events
            ->limit(4)
            ->get();

        $bestRatedEvent = $events
//            ->whereHas('activity.reviews', function($q) {
//                $q->havingRaw('AVG(rating) >= ?', [0.1]);
//            })
//            ->join('activity', 'activity.id', '=', 'event.activity_id')
//            ->join('review', 'activity.id', '=', 'review.activity_id')

//            ->selectRaw('AVG(review.rating) AS average_rating')
            ->groupBy('event.id')

            //            ->select(DB::raw('avg(rating) as average'))
//            ->limit(4)
            ->get();

//        dd($bestRatedEvent);


        return view('welcome')
            ->with('events', $events)
            ->with('events', $events)
            ->with('bestRatedEvent', $bestRatedEvent)
            ->with('categories', $categories);
    }
}
