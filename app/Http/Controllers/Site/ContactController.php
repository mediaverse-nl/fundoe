<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\ContactStoreRequest;
use App\Mail\SendContact;
use App\Mail\SendContactToAdmin;
use App\Traits\SeoManager;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    use SEOTools, SeoManager;

    public function index()
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

        return view('site.contact');
    }

    public function store(ContactStoreRequest $request)
    {
        Mail::to($request->email)
            ->send(new SendContact($request));

        Mail::to('contact@fundoe.nl')
            ->send(new SendContactToAdmin($request));

        return redirect()->back()->with('success', 'Bedankt voor je bericht, we nemen zo snel mogelijk contact met u op.');
    }
}
