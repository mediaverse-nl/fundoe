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
                            <h6 class="title">Range input </h6>
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
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Selection </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <div class="custom-control custom-checkbox">
                                    <span class="float-right badge badge-light round">52</span>
                                    <input type="checkbox" class="custom-control-input" id="Check1">
                                    <label class="custom-control-label" for="Check1">Samsung</label>
                                </div> <!-- form-check.// -->

                                <div class="custom-control custom-checkbox">
                                    <span class="float-right badge badge-light round">132</span>
                                    <input type="checkbox" class="custom-control-input" id="Check2">
                                    <label class="custom-control-label" for="Check2">Black berry</label>
                                </div> <!-- form-check.// -->

                                <div class="custom-control custom-checkbox">
                                    <span class="float-right badge badge-light round">17</span>
                                    <input type="checkbox" class="custom-control-input" id="Check3">
                                    <label class="custom-control-label" for="Check3">Samsung</label>
                                </div> <!-- form-check.// -->

                                <div class="custom-control custom-checkbox">
                                    <span class="float-right badge badge-light round">7</span>
                                    <input type="checkbox" class="custom-control-input" id="Check4">
                                    <label class="custom-control-label" for="Check4">Other Brand</label>
                                </div> <!-- form-check.// -->
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
                                <img class="card-img-top" src="http://placehold.it/700x400" alt="Card image cap" height="210px;">
                                <div class="card-body">

                                    <h5 class="card-title">{!! $event->activity !!}</h5>
                                    <h5 class="card-title">{!! $event->activity->title !!}</h5>
                                    <p class="card-text truncateOpt">{!! $event->activity->description !!}</p>
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{!! route('site.activity.show', [$event->activity->titleDash(), $event->id]) !!}" class="btn btn-sm btn-primary">
                                                Lees meer
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <h2 class="pull-right">€ {!! $event->activity->price !!}<small> p.p.</small></h2>
                                        </div>
                                    </div>
                                    <br>
                                    <small class="text-muted">duur: {!! $event->diffInTime()!!}</small>
                                    <br>
                                    <small class="text-muted" data-countdown="{!! $event->startDatetime('Y/m/d H:i:s') !!}">{!! $event->startToEnd() !!}</small>
                                    <br>
                                    <br>
                                    <small class="text-muted" data-countdown="{!! $event->timeToOrder('Y/m/d H:i:s') !!}">{!! $event->timeToOrder('Y/m/d H:i:s') !!}</small>
                                    <br>
                                    <small class="text-muted">{!! $event->remainingTimeToStart() !!}</small>
                                    {{--<footer class="post-footer d-flex align-items-center" style="margin-top: 10px;">--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="splitter-bar"><i class="fas fa-clock"></i> 2 months ago</div>--}}
                                            {{--<div class="splitter-bar"><i class="fas fa-comments"></i> 2 reviews</div>--}}
                                        {{--</div>--}}
                                   {{--</footer>--}}
                                    {{--<div id="getting-started"></div>--}}

                                    {{--<div data-countdown="2019/01/20"></div>--}}
                                    {{--<div data-countdown="2019/02/01"></div>--}}
                                    {{--<div data-countdown="2019/02/11"></div>--}}
                                    {{--<div data-countdown="2019/01/19"></div>--}}
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
    <script type="text/javascript" src="http://cdn.rawgit.com/hilios/jQuery.countdown/2.1.0/dist/jquery.countdown.min.js"></script>"


    <script type="text/javascript">
        $( document ).ready(function() {
            $('[data-countdown]').each(function() {
                var $this = $(this), finalDate = $(this).data('countdown');
                $this.countdown(finalDate, function(event) {
                    $this.html(event.strftime('%D days %H:%M:%S'));
                });
            });
        });
    </script>
@endpush
