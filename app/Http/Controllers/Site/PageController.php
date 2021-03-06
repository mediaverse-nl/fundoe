<?php

namespace App\Http\Controllers\Site;

use App\Faq;
use App\Traits\SeoManager;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    use SEOTools, SeoManager;

    public function __construct()
    {

    }

    public function terms()
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

        return view('site.page.terms');
    }

    public function policy()
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

        return view('site.page.policy');
    }

    public function about()
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

        return view('site.page.about');
    }

    public function faq()
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

        $faq = new Faq;

        $faqs = $faq->get();

        return view('site.page.faq')
            ->with('faqs', $faqs);
    }

    public function activiteiten()
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

        return view('site.page.activiteiten');
    }

    public function categories()
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

        return view('site.page.categories');
    }
}
