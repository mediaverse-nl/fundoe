@extends('layouts.app')

@section('content')

    <div class="container product-cards">
        <br>
        <div class="row">
            <div class="col-sm-3">
                {{--<p>Filter</p>--}}

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
                                        {{--<label>Min</label>--}}
                                        <input type="number" class="form-control" id="inputEmail4" placeholder="$0">
                                    </div>
                                    <div class="form-group col-md-12 text-right">
                                        {{--<label>Max</label>--}}
                                        <input type="number" class="form-control" placeholder="$1,0000">
                                    </div>
                                </div>

                            </div> <!-- card-body.// -->
                        </div>
                        <header class="card-header">
                            <h6 class="title">Locaties </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <div class="custom-control custom-checkbox">
                                    <span class="float-right badge badge-light round">52</span>
                                    <input type="checkbox" class="custom-control-input" id="Check1">
                                    <label class="custom-control-label" for="Check1">Eindhoven</label>
                                </div> <!-- form-check.// -->

                                <div class="custom-control custom-checkbox">
                                    <span class="float-right badge badge-light round">132</span>
                                    <input type="checkbox" class="custom-control-input" id="Check2">
                                    <label class="custom-control-label" for="Check2">Veldhoven</label>
                                </div> <!-- form-check.// -->

                            </div> <!-- card-body.// -->
                        </div>
                        <header class="card-header">
                            <h6 class="title">Rating </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="" class="">0</label>
                                        <label for="" class="pull-right">5</label>
                                        <input style="width: 100% !important;" id="ex6" type="text" data-slider-min="0" data-slider-max="5" data-slider-step="0.5" data-slider-value="0"/>
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
                                    <div class="form-group col-md-6">
                                        <label>Min</label>
                                        <input type="number" class="form-control" id="inputEmail4" placeholder="$0">
                                    </div>
                                    <div class="form-group col-md-6 text-right">
                                        <label>Max</label>
                                        <input type="number" class="form-control" placeholder="$1,0000">
                                    </div>
                                </div>
                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- card-group-item.// -->
                </div> <!-- card.// -->

            </div>
            <div class="col-9">

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
                                            {{--<a href="{!! route('site.activity.show', [$event->activity->titleDash(), $event->id]) !!}" class="btn btn-sm btn-block btn-primary">--}}
                                                {{----}}
                                            {{--</a>--}}
                                            <!-- Large modal -->
                                            <button type="button" class="btn btn-sm btn-block btn-primary" data-toggle="modal" data-target=".bd-modal-lg-{!! $event->activity->id !!}">boek nu</button>

                                            <div class="modal fade bd-modal-lg-{!! $event->activity->id !!}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        {{--<div class="modal-header">--}}
                                                            {{--<h4 class="modal-title">Modal Heading</h4>--}}
                                                            {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                                                        {{--</div>--}}

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
                                            <h2 class="pull-right">€ {!! $event->activity->price !!}<small style="font-size: 15px;"> p.p.</small></h2>
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
        .truncateOpt {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
    </style>
@endpush

@push('js')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.1.0/js/jquery.plugin.min.js"></script>--}}
    <script type="text/javascript" src="http://cdn.rawgit.com/hilios/jQuery.countdown/2.1.0/dist/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.0/bootstrap-slider.min.js"></script>


    <script type="text/javascript">
        $( document ).ready(function() {
            $('[data-countdown]').each(function() {
                var $this = $(this), finalDate = $(this).data('countdown');
                $this.countdown(finalDate, function(event) {
                    $this.html(event.strftime('%D dagen %H:%M:%S'));
                });
            });


            $("#ex6").slider({
                tooltip: 'always'
            });

        });

    </script>
@endpush
