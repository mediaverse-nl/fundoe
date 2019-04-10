<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Event;
use App\Traits\SeoManager;
use Artesaos\SEOTools\Traits\SEOTools;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
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

        $queryWithOutFilter = array_except($query, ['filter']);

         if (!Input::has('filter') && !empty($queryWithOutFilter)){
            $encrypted = Crypt::encryptString(json_encode($query));
            return redirect(
            route('site.category.show', $id).'?filter='.$encrypted
            );
        }

        if (Input::has('filter') ){
            try {
                $decrypted = Crypt::decryptString(Input::get('filter'));
            } catch (DecryptException $e) {
                return redirect(
                    route('site.category.show', $id)
                );
            }

            $filter = json_decode($decrypted, true);

            if (empty(array_filter($filter))) {
                return redirect(
                    route('site.category.show', $id)
                );
            }
        }else{
            $filter = [];
        }

        $categories = $this->category->get();
        $from = $this->event->ableToOrderDate();
        $baseActivity = $category->activities()->get();

        $baseEvents = $this->event
            ->whereHas('activity', function ($q) use ($category) {
                $q->where('category_id', '=', $category->id);
            })
            ->where('status', '=', 'public')
            ->whereDate('start_datetime', '>=', $from)
            ->orderBy('start_datetime', 'asc');

        $events = $this->event
            ->whereHas('activity', function ($q) use ($category, $filter) {
                $q->where('category_id', '=', $category->id);

                if(!empty($filter['regios']) && $filter['regios'] !== null){
                    $i = 1;
                    foreach ($filter['regios'] as $v){
                         if ($i == 1){
                            $q->where('activity.region', $v);
                        } else{
                            $q->orWhere('region', '=', $v);
                        }
                        $i++;
                    }
                }
            })
            ->where(function ($q) use ($filter){
                if(!empty($filter['groep']) && $filter['groep'] !== null){
                    $i = 1;
                    foreach ($filter['groep'] as $i){
                        if ($i == 1){
                            $q->where('target_group', '=', $i);
                        } else{
                            $q->orWhere('target_group', '=', $i);
                        }
                        $i++;
                    }
                }
            })
            ->where(function ($q) use ($filter){
                if (!empty($filter['van_datum'])){
                    $q->where('start_datetime', '>=', $filter['van_datum']);
                }
                if (!empty($filter['tot_datum'])){
                    $q->where('end_datetime', '<=', $filter['tot_datum']);
                }
            })
            ->where(function ($q) use ($filter){
                if (!empty($filter['prijs']) ){
                    $q->whereBetween('price', [explode(',',$filter['prijs'])[0], explode(',',$filter['prijs'])[1]]);
                }
            })
            ->where('status', '=', 'public')
            ->whereDate('start_datetime', '>=', $from)
            ->orderBy('start_datetime', 'asc')
            ->get();

        return view('site.category.show')
            ->with('baseActivity', $baseActivity)
            ->with('baseEvents', $baseEvents)
            ->with('events', $events)
            ->with('filter', $filter)
            ->with('categories', $categories)
            ->with('category', $category);
    }
}
