<div class="col-md-6 col-sm-6 col-xs-12" style="padding: 10px 10px; border-radius: 0px;">
    <div class="card shadow-sm bg-white" style="border-radius: 0px;" >
        <img class="card-img-top" src="{!! $event->activity->thumbnail() !!}" alt="Card image cap" height="210px;" style="border-radius: 0px">
        <div class="text-center" style="width: 100% !important; background: #eeeeee; padding-top: 5px;">
            <h3 class="text-muted text-center" style="color: rgba(255, 255, 255, 0.5);" data-countdown="{!! $event->timeToOrder('Y/m/d H:i:s') !!}">{!! $event->timeToOrder('Y/m/d H:i:s') !!}</h3>
        </div>
        <div class="card-body">
            <h5 class="card-title">{!! $event->activity->title !!}</h5>
            <p class="card-text truncated" >{!! $event->activity->description !!}</p>
            <div class="row">
                <div class="col-5">
                    <a href="{!! route('site.activity.show', [$event->activity->titleDash(), $event->id]) !!}" class="btn btn-sm btn-block btn-primary">
                        Lees meer
                    </a>
                    @component('components.modal-card', [
                        'targetId' => $event->id,
                        'event' => $event,
                    ])
                        @slot('title')
                            {!! $event->activity->title !!}
                        @endslot
                    @endcomponent
                    {{--<!-- Large modal -->--}}
                </div>
                <div class="col-7">
                    <h2 class="pull-right">€ {!! number_format($event->price, 2) !!}<small style="font-size: 15px;"> p.p.</small></h2>
                    <small class="pull-right"><i class="fa fa-calendar-alt"></i> {!! $event->start_datetime->format('d-m-y h:i') !!}</small>
                </div>
            </div>
            <footer class="post-footer d-flex align-items-center" style="margin-top: 10px;">
                <div class="row">
                    <div class="splitter-bar">
                        <i class="fas fa-clock"></i> {!! $event->diffInTime()!!}min
                    </div>
                    <div class="splitter-bar">
                        <i class="fas fa-comments"></i> {!! $event->activity->reviews->count('id') !!} reviews
                    </div>
                    <div class="splitter-bar">
                        <i class="fas fa-star"></i> {!! $event->activity->reviews->count('id') !== 0 ? number_format($event->activity->reviews->avg('rating'), 1).'/5' : 'n.v.t.' !!}
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
