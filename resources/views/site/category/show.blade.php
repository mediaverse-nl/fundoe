@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('site.category.show', $category) !!}
@endsection

@section('content')

    <div class="container product-cards">

        <div class="row">
            <div class="col-sm-3">
                {{--<p>Filter</p>--}}
                {!! Form::open(['route' => ['site.category.show', $category->id], 'method' => 'get', 'id' => 'filterForm']) !!}

                <div class="list-group shadow-sm bg-white" style="border-radius: 0px !important;">
                    @foreach($categories as $cate)
                        <a href="{!! route('site.category.show', $cate->id) !!}" class="list-group-item{!! $category->id != $cate->id ? '' : ' active' !!}" style="border-radius: 0px !important;">
                            {!! $cate->value!!} <span class="float-right badge badge-light round"></span>
                        </a>
                    @endforeach
                </div>

                <br>

                <div class="card shadow-sm bg-white" style="border-radius: 0px;">
                    <header class="card-header">
                        <h6 class="title">Datum range</h6>
                    </header>
                    <div class="filter-content">
                        <div class="card-body" style="margin-top: -10px;">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                     <div class="input-group date" id="datetimepicker1" data-target-input="nearest" style="margin-bottom: 5px;">
                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker" style="-moz-border-radius-bottomleft: .25rem;">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        {!! Form::text('start_datetime', null, ['class' => 'datetimepicker-input form-control'.(!$errors->has('start_datetime') ? '': ' is-invalid '), 'data-toggle' => 'datetimepicker', 'data-target' => '#datetimepicker1', 'autocomplete' => false, 'placeholder' => 'datum vanaf']) !!}
                                    </div>
                                     <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker" style="-moz-border-radius-bottomleft: .25rem;">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        {!! Form::text('start_datetime', null, ['class' => 'datetimepicker-input form-control'.(!$errors->has('start_datetime') ? '': ' is-invalid '), 'data-toggle' => 'datetimepicker', 'data-target' => '#datetimepicker2', 'autocomplete' => false, 'placeholder' => 'datum t/m']) !!}
                                    </div>
                                </div>
                            </div>
                        </div> <!-- card-body.// -->
                    </div>
                </div>

                <br>

                <div class="card shadow-sm bg-white">
                    <header class="card-header">
                        <h6 class="title">Prijs range </h6>
                    </header>
                    <div class="filter-content">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12" style="padding-top: 15px;">
                                    <div class="row text-center">
                                        <div class="col-2" style="padding: 5px;">{!! number_format($events->min('price'),0) !!}</div>
                                        <div class="col-8" style="padding: 3px 5px;">
                                            <input style="width: 100% !important;" class="custom-range" type="hidden" data-slider-min="{!! number_format($events->min('price'),0) !!}" data-slider-max="{!! number_format($events->max('price'),0) !!}" data-slider-value="[{!! number_format($events->min('price'),0) !!},{!! number_format($events->max('price'),0) !!}]"/>
                                        </div>
                                        <div class="col-2" style="padding: 5px;">{!! number_format($events->max('price'),0) !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- card-body.// -->
                    </div>
                </div> <!-- card.// -->

                <br>

                <div class="card shadow-sm bg-white">
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
                </div>

                <br>

                <div class="card shadow-sm bg-white">
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
                </div>

                <br>

                <div class="card shadow-sm bg-white">
                    <header class="card-header">
                        <h6 class="title">Rating </h6>
                    </header>
                    <div class="filter-content">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12" style="padding-top: 15px;">
                                    <div class="row text-center">
                                        <div class="col-md-2" style="padding: 5px;">1</div>
                                        <div class="col-md-8" style="padding: 3px 5px;">
                                            <input style="width: 100% !important;" class="custom-range" type="hidden" name="rating" data-slider-min="0" data-slider-max="5" data-slider-step="0.5" data-slider-value="[{!! \Illuminate\Support\Facades\Input::has('rating') ? \Illuminate\Support\Facades\Input::get('rating') : '0,5' !!}]" value="{!! \Illuminate\Support\Facades\Input::get('rating') !!}" />
                                        </div>
                                        <div class="col-md-2" style="padding: 5px;">5</div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- card-body.// -->
                    </div>
                </div>

                {!! Form::close() !!}
                <br>
            </div>
            <div class="col-9">

                <div style="margin-top: -7px;">
                    @if($events->count() > 1)
                        <small class="text-muted lead"> er zijn {!! $events->count() !!} resultaten gevonden.</small>
                    @else
                        <small class="text-muted lead"> er is {!! $events->count() !!} resultaat gevonden.</small>
                    @endif
                </div>

                <div class="row">

                    @foreach($events as $event)

                        @component('components.event-card', ['event' => $event])

                        @endcomponent

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.1.0/js/jquery.plugin.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.1.0/dist/jquery.countdown.min.js"></script>
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

        $("#countdown")
            .countdown("2017/01/01", function(event) {
                $(this).text(
                    event.strftime('%D days %H:%M:%S')
                );
            });

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
                // function () {
                // $("input").each(function(index, input){
                //     if($(input).val() == "") {
                //         $(input).remove();
                //     }
                // });
            // });
        }
        $('#filterForm').change(function() {
            intervalTimer();
        });
    });

    $(function () {
        Date.prototype.addDays = function(days) {
            this.setDate(this.getDate() + parseInt(days));
            return this;
        };

        var today = new Date().addDays(2);

        $('#datetimepicker1').datetimepicker({
            useCurrent: false,
            minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate(), today.getHours(), today.getMinutes()),
            autoclose: true,
            todayBtn: true,
            format: 'YYYY/MM/DD HH:mm'
        });
        $('#datetimepicker2').datetimepicker({
            useCurrent: false,
            minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
            autoclose: true,
            format: 'YYYY/MM/DD HH:mm'
        });
        $("#datetimepicker1").on("change.datetimepicker", function (e) {
            $('#datetimepicker2').datetimepicker('minDate', e.date);
        });
        $("#datetimepicker2").on("change.datetimepicker", function (e) {
            $('#datetimepicker1').datetimepicker('maxDate', e.date);
        });
    });
</script>
@endpush