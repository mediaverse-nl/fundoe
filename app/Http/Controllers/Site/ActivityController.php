<?php

namespace App\Http\Controllers\Site;

use App\Activity;
use App\Event;
use App\Traits\SeoManager;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    use SEOTools, SeoManager;

    protected $activity;
    protected $event;

    public function __construct(Activity $activity, Event $event)
    {
        $this->activity = $activity;
        $this->event = $event;
    }

    public function show($title = null, $id)
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

        $event = $this->event->findOrFail($id);

        return view('site.activity.show')
            ->with('event', $event);
    }


}
