<?php

namespace App\Http\Controllers\Site;

use App\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct()
    {

    }

    public function terms()
    {
        return view('site.page.terms');
    }

    public function policy()
    {
        return view('site.page.policy');
    }

    public function about()
    {
        return view('site.page.about');
    }

    public function faq()
    {
        $faq = new Faq;

        $faqs = $faq->get();

        return view('site.page.faq')
            ->with('faqs', $faqs);
    }
}
