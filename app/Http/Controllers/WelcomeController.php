<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use Artesaos\SEOTools\Traits\SEOTools;

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
            ->orderBy('start_datetime', 'asc')
            ->get();

        return view('welcome')
            ->with('events', $events)
            ->with('categories', $categories);
    }
}
