@extends('layouts.app')

@section('content')

    <div class="container product-cards">
        <br>
        <div class="row">
            <div class="col-sm-3">
                {{--<p>Filter</p>--}}
                {!! Form::open(['route' => ['site.category.show', $category->id], 'method' => 'get', 'id' => 'filterForm']) !!}


                <div class="list-group">
                    @foreach($categories as $cate)
                        <a href="{!! route('site.category.show', $cate->id) !!}" class="list-group-item{!! $category->id != $cate->id ? '' : ' active' !!}" style="">
                            {!! $cate->value!!} <span class="float-right badge badge-light round"></span>
                        </a>
                    @endforeach
                </div>

                <br>

                <div class="card">

                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Datum range</h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">datum vanaf</label>
                                        <div class="input-group date" id="datetimepicker2" data-target-input="nearest" style="margin-bottom: 5px;">
                                            <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker" style="-moz-border-radius-bottomleft: .25rem;">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                            {!! Form::text('start_datetime', null, ['class' => 'datetimepicker-input form-control'.(!$errors->has('start_datetime') ? '': ' is-invalid '), 'data-toggle' => 'datetimepicker', 'data-target' => '#datetimepicker2']) !!}
                                        </div>
                                        <label for="">datum t/m</label>
                                        <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                            <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker" style="-moz-border-radius-bottomleft: .25rem;">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                            {!! Form::text('start_datetime', null, ['class' => 'datetimepicker-input form-control'.(!$errors->has('start_datetime') ? '': ' is-invalid '), 'data-toggle' => 'datetimepicker', 'data-target' => '#datetimepicker2']) !!}
                                        </div>


                                    </div>
                                </div>

                            </div> <!-- card-body.// -->
                        </div>
                        <header class="card-header">
                            <h6 class="title">Doel groep </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                @foreach($baseEvents->get()->groupBy('target_group') as $target)
                                    <div class="custom-control custom-checkbox">
                                        <span class="float-right badge badge-light round">{!! $target->count() !!}</span>
                                        <input type="checkbox" name="groep[]" class="custom-control-input" value="{!! $target->first()->target_group  !!}" id="Check{!! $target->first()->id !!}" {!! \Illuminate\Support\Facades\Input::has('groep') ? (in_array($target->first()->target_group, \Illuminate\Support\Facades\Input::get('groep')) ? 'checked' : '') : '' !!}>
                                        <label class="custom-control-label" for="Check{!! $target->first()->id !!}">{!! $target->first()->target_group !!}</label>
                                    </div> <!-- form-check.// -->
                                @endforeach
                            </div> <!-- card-body.// -->
                        </div>
                        <header class="card-header">
                            <h6 class="title">Regio's </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                @foreach($baseActivity->groupBy('region') as $re)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="regios[]" class="custom-control-input" id="regio{!! $re->first()->id !!}" value="{!! $re->first()->region !!}" {!! \Illuminate\Support\Facades\Input::has('regios') ? (in_array($re->first()->region, \Illuminate\Support\Facades\Input::get('regios')) ? 'checked' : '') : 'nu' !!} />
                                        <label class="custom-control-label" for="regio{!! $re->first()->id !!}">{!! $re->first()->region !!}</label>
                                    </div> <!-- form-check.// -->
                                @endforeach
                            </div> <!-- card-body.// -->
                        </div>
                        <header class="card-header">
                            <h6 class="title">Rating </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        {{--<label for="" class="">0</label>--}}
                                        {{--<label for="" class="pull-right">5</label>--}}
                                        <br>
                                        <input style="width: 100% !important;"  class="custom-range" type="hidden" name="rating" data-slider-min="0" data-slider-max="5" data-slider-step="0.5" data-slider-value="[{!! \Illuminate\Support\Facades\Input::has('rating') ? \Illuminate\Support\Facades\Input::get('rating') : '0,5' !!}]" value="{!! \Illuminate\Support\Facades\Input::get('rating') !!}" />
                                    </div>
                                </div>
                            </div> <!-- card-body.// -->
                        </div>
                        <header class="card-header">
                            <h6 class="title">Prijs range </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <br>
                                        <input style="width: 100% !important;" class="custom-range" type="hidden" data-slider-min="{!! number_format($events->min('price'),0) !!}" data-slider-max="{!! number_format($events->max('price'),0) !!}" data-slider-value="[{!! number_format($events->min('price'),0) !!},{!! number_format($events->max('price'),0) !!}]"/>

                                        {{--<label>Min</label>--}}
                                        {{--<input type="number" class="form-control" id="inputEmail4" placeholder="€{!! $events->min('price') !!}">--}}
                                    </div>
                                    {{--<div class="form-group col-md-6 text-right">--}}
                                        {{--<label>Max</label>--}}
                                        {{--<input type="number" class="form-control" placeholder="€{!! $events->max('price') !!}">--}}
                                    {{--</div>--}}
                                </div>
                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- card-group-item.// -->
                </div> <!-- card.// -->

                {!! Form::close() !!}

            </div>
            <div class="col-9">

                @if($events->count() > 1)
                    <small class="text-muted"> er zijn {!! $events->count() !!} resultaten gevonden.</small>
                @else
                    <small class="text-muted"> er is {!! $events->count() !!} resultaat gevonden.</small>
                @endif


                <div class="row">

                    @foreach($events as $event)

                        <div class="col-6" style="padding: 10px 10px">
                            <div class="card">
                                <img class="card-img-top" src="{!! $event->activity->thumbnail() !!}" alt="Card image cap" height="210px;">
                                <div class="text-center" style="width: 100% !important; background: black; padding-top: 5px;">
                                    <h3 class="text-muted text-center" style="color: rgba(255, 255, 255, 0.5);" data-countdown="{!! $event->timeToOrder('Y/m/d H:i:s') !!}">{!! $event->timeToOrder('Y/m/d H:i:s') !!}</h3>
                                </div>
                                <div class="card-body">

                                    <h5 class="card-title">{!! $event->activity->title !!}</h5>
                                    <p class="card-text truncateOpt">{!! $event->activity->description !!}</p>
                                    <div class="row">
                                        <div class="col-5">
                                            <a href="{!! route('site.activity.show', [$event->activity->titleDash(), $event->id]) !!}" class="btn btn-sm btn-block btn-primary">
                                                Lees meer
                                            </a>
                                            {{--<!-- Large modal -->--}}
                                            <button type="button" class="btn btn-sm btn-block btn-primary" data-toggle="modal" data-target=".bd-modal-lg-{!! $event->activity->id !!}">boek nu</button>

                                            <div class="modal fade bd-modal-lg-{!! $event->activity->id !!}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Modal Heading</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">


                                                            {!! $event !!}
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--{!! \Carbon\Carbon::setLocale('nl') !!}--}}

                                        </div>
                                        <div class="col-7">
                                            <h2 class="pull-right">€ {!! number_format($event->price, 2) !!}<small style="font-size: 15px;"> p.p.</small></h2>
                                            <small class="pull-right"><i class="fa fa-calendar-alt"></i> {!! $event->start_datetime->format('d-m-y h:i') !!}</small>
                                        </div>
                                    </div>
                                    {{--<br>--}}
                                    {{--<span class="badge badge-success"><i class="fa fa-clock"></i> {!! $event->diffInTime()!!}min</span>--}}

                                    {{--<small class="text-muted"></small>--}}
                                    {{--<br>--}}
                                    {{--<small class="text-muted" data-countdown="{!! $event->timeToOrder('Y/m/d H:i:s') !!}">{!! $event->timeToOrder() !!}</small>--}}
                                    {{--<small class="text-muted" >{!! $event->timeToOrder() !!}</small>--}}
                                    {{--<br>--}}
                                    {{--<span class="badge badge-success"><i class="fa fa-clock"></i>{!! $event->diffInTime()!!}min</span>--}}
                                    {{--<br>--}}
                                    {{--<br>--}}
                                    {{--<small class="text-muted">{!! $event->remainingTimeToStart() !!}</small>--}}
                                    {{--<br>--}}
                                    <footer class="post-footer d-flex align-items-center" style="margin-top: 10px;">
                                        <div class="row">
                                            <div class="splitter-bar">
                                                <i class="fas fa-clock"></i> {!! $event->diffInTime()!!}min
                                            </div>
                                            <div class="splitter-bar">
                                                <i class="fas fa-comments"></i> {!! $event->activity->reviews->count('id') !!} reviews
                                            </div>
                                            <div class="splitter-bar">
                                                <i class="fas fa-star"></i> {!! number_format($event->activity->reviews->avg('rating'), 1) !!}/5
                                            </div>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>

            </div>

        </div>
    </div>

@endsection

@push('css')
    <link href="{{ asset('/css/site/category.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.0/css/bootstrap-slider.min.css" rel="stylesheet">
    <style>
        .filter-content .form-group{
            margin-bottom: 0px;
        }
        .truncateOpt {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .slider .tooltip.top {
            margin-top: -36px;
        }
        .slider.slider-horizontal .tooltip {
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
        }
        .slider .tooltip {
            pointer-events: none;
        }
        .tooltip.top {
            padding: 5px 0;
            margin-top: -3px;
        }
        .tooltip.in {
            filter: alpha(opacity=90);
            opacity: .9;
        }
        .tooltip {
            position: absolute;
            z-index: 1070;
            display: block;
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: left;
            text-align: start;
            text-decoration: none;
            text-shadow: none;
            text-transform: none;
            letter-spacing: normal;
            word-break: normal;
            word-spacing: normal;
            word-wrap: normal;
            white-space: normal;
            filter: alpha(opacity=0);
            opacity: 0;
            line-break: auto;
        }
    </style>
@endpush

@push('js')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.1.0/js/jquery.plugin.min.js"></script>--}}
    <script type="text/javascript" src="http://cdn.rawgit.com/hilios/jQuery.countdown/2.1.0/dist/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.0/bootstrap-slider.min.js"></script>
    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>--}}

    {{--<script type="text/javascript">--}}
        {{--$(function () {--}}
            {{--$('#datetimepicker2').datetimepicker({--}}
                {{--locale: 'nl',--}}
                {{--format: 'YYYY-MM-D HH:mm:ss'--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}

    <script type="text/javascript">
        $( document ).ready(function() {
            $('[data-countdown]').each(function() {
                var $this = $(this), finalDate = $(this).data('countdown');
                $this.countdown(finalDate, function(event) {
                    $this.html(event.strftime('%D dagen %H:%M:%S'));
                });
            });


            $(".custom-range").slider({
                tooltip: 'always'
            });

            var timer;

            function intervalTimer() {
                if (timer) clearInterval(timer);
                timer = setInterval(function() {
                    clearInterval(timer);
                    submitForm();
                }, 1500);
            }

            function submitForm(){
                console.log('test');

                $( "#filterForm" ).submit();
            }

            $('form').change(function() {
                intervalTimer();
            });
        });

    </script>
@endpush
