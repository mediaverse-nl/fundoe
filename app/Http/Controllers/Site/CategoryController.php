<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Event;
use App\Traits\SeoManager;
use Artesaos\SEOTools\Traits\SEOTools;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    use SEOTools, SeoManager;

    protected $category;
    protected $event;

    public function __construct(Category $category, Event $event)
    {
        $this->category = $category;
        $this->event = $event;
    }

    public function index()
    {
        $categories = $this->category->get();

        //default seo
        $this->seo()
            ->setTitle($this->getPageSeo()->title.' | fundoe.nl')
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

        return view('site.category.index')
            ->with('categories', $categories);
    }

    public function show($id)
    {
        $category = $this->category->findOrFail($id);

        //default seo
        $this->seo()
            ->setTitle($category->value .' | fundoe.nl')
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

        $query = collect(request()->query)->toArray();

        foreach ($query as $q => $v){
            if ($v == null || $v = '' || empty($v)){
                $cleanUrl = array_filter($query);
                $decodeUrl = urldecode(http_build_query($cleanUrl));
                $newQuery = "?".$decodeUrl;
                return redirect(
                    route('site.category.show', $id).$newQuery
                );
            }
        }

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
            ->whereDate('start_datetime', '>=', $from)
            ->orderBy('start_datetime', 'asc')
            ->where(function ($q){
                if (Input::has('prijs') ){
                    $q->whereBetween('price', [
                        explode(',',Input::get('prijs'))[0],
                        explode(',',Input::get('prijs'))[1]
                    ]);
                }
                if (Input::has('van_datum') ){
                    $q->where('start_datetime', '>=', Input::get('van_datum'));
                }
                if (Input::has('tot_datum') ){
                    $q->where('end_datetime', '<=', Input::get('tot_datum'));
                }
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
