<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use App\Traits\SeoManager;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    use SEOTools, SeoManager;

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
            ->setTitle($this->getPageSeo()->title .' | fundoe.nl')
            ->setDescription($this->getPageSeo()->description);
        //opengraph
        $this->seo()
            ->opengraph()
            ->setUrl(url()->current())
            ->addProperty('type', 'website');
        //twitter
        $this->seo()
            ->twitter()
            ->setSite('@username');

        $categories = $this->category->get();
        $from = $this->event->ableToOrderDate();

        $events = $this->event
            ->whereDate('start_datetime', '>=', $from)
            ->orderBy('start_datetime', 'asc');

        $bestSoldEvent = $events
            ->limit(8)
            ->get();

        $bestRunningEvent = $events
            ->limit(8)
            ->get();

        return view('welcome')
            ->with('events', $events)
            ->with('bestSoldEvent', $bestSoldEvent)
            ->with('bestRunningEvent', $bestRunningEvent)
            ->with('categories', $categories);
    }
}
