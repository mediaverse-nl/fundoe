<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    use SEOTools;

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

        return view('welcome');
    }
}
