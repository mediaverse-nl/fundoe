@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('site.category.show', $category) !!}
@endsection

@section('content')

    <div class="container product-cards">

        <div class="row">
            <div class="col">
                {!! Form::open(['route' => ['site.category.show', $category->id], 'method' => 'get', 'id' => 'filterForm']) !!}

                <div class="list-group shadow-sm bg-white" style="border-radius: 0px !important;">
                    @foreach($categories as $cate)
                        <a href="{!! route('site.category.show', $cate->id) !!}" class="list-group-item{!! $category->id != $cate->id ? '' : ' active' !!}" style="border-radius: 0px !important;">
                            {!! $cate->value!!} <span class="float-right badge badge-light round"></span>
                        </a>
                    @endforeach
                </div>

                <br>

                @if(floor($baseEvents->min('price')) !== number_format($baseEvents->max('price'),0)
                    && $baseEvents->min('price') !== $baseEvents->max('price'))
                    <div class="card shadow-sm bg-white">
                        <header class="card-header">
                            <h6 class="title">Prijsrange </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12" style="padding-top: 15px;">
                                        <div class="row text-center">
                                            <div class="col-2" style="padding: 5px;"><small>{!! floor($baseEvents->min('price')) !!}</small></div>
                                            <div class="col-8" style="padding: 3px 5px;">
                                                <input style="width: 100% !important;" name="prijs" class="custom-range" type="hidden"
                                                       data-slider-min="{!! floor($baseEvents->min('price')) !!}"
                                                       data-slider-max="{!! ceil($baseEvents->max('price')) !!}"
                                                       data-slider-value="[{!! !empty($filter['prijs']) ? explode(',',$filter['prijs'])[0] : floor($baseEvents->min('price')) !!},{!! !empty($filter['prijs']) ? explode(',',$filter['prijs'])[1] : ceil($baseEvents->max('price')) !!}]"/>
                                            </div>
                                            <div class="col-2" style="padding: 5px;"><small>{!! ceil($baseEvents->max('price')) !!}</small></div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- card-body.// -->
                        </div>
                    </div> <!-- card.// -->

                    <br>
                @endif

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
                                            <div class="input-group-text"
                                            ><i class="fa fa-calendar"></i></div>
                                        </div>
                                         <input class="datetimepicker-input form-control"
                                                name="van_datum"
                                                value="{!! !empty($filter['van_datum']) ? $filter['van_datum'] : '' !!}"
                                                data-toggle="datetimepicker"
                                                data-target="#datetimepicker1"
                                                autocomplete="off"
                                                placeholder="datum vanaf"
                                                type="text">
                                    </div>
                                     <div class="input-group date" id="datetimepicker2" data-target-input="nearest" style="">
                                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker" style="-moz-border-radius-bottomleft: .25rem;">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                         <input class="datetimepicker-input form-control"
                                                name="tot_datum"
                                                value="{!! !empty($filter['tot_datum']) ? $filter['tot_datum'] : '' !!}"
                                                data-toggle="datetimepicker"
                                                data-target="#datetimepicker2"
                                                autocomplete="off"
                                                placeholder="datum t/m"
                                                type="text">
{{--                                        {!! Form::text('start_datetime', null, ['class' => 'datetimepicker-input form-control'.(!$errors->has('start_datetime') ? '': ' is-invalid '), 'data-toggle' => 'datetimepicker', 'data-target' => '#datetimepicker2', 'autocomplete' => 'off', 'placeholder' => 'datum t/m']) !!}--}}
                                     </div>
                                </div>
                            </div>
                        </div> <!-- card-body.// -->
                    </div>
                </div>

                <br>

                <div class="card shadow-sm bg-white">
                    <header class="card-header">
                        <h6 class="title">Doelgroep </h6>
                    </header>
                    <div class="filter-content">
                        <div class="card-body">
                            @foreach($baseEvents->get()->groupBy('target_group') as $target)
                                <div class="custom-control text-truncate custom-checkbox">
                                    <span class="float-right badge badge-light round">{!! $target->count() !!}</span>
                                    <input type="checkbox" name="groep[]" class="custom-control-input" value="{!! $target->first()->target_group  !!}" id="Check{!! $target->first()->id !!}" {!! !empty($filter['groep']) ? (in_array($target->first()->target_group, $filter['groep']) ? 'checked' : '') : '' !!}>
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
                                <div class="custom-control text-truncate custom-checkbox">
                                    <input type="checkbox" name="regios[]" class="custom-control-input" id="regio{!! $re->first()->id !!}" value="{!! $re->first()->region !!}" {!! !empty($filter['regios']) ? (in_array($re->first()->region, $filter['regios']) ? 'checked' : '') : 'nu' !!} />
                                    <label class="custom-control-label" for="regio{!! $re->first()->id !!}">{!! $re->first()->region !!}</label>
                                </div> <!-- form-check.// -->
                            @endforeach
                        </div> <!-- card-body.// -->
                    </div>
                </div>

                <br>

                {!! Form::close() !!}
                <br>
            </div>
            <div class="col-md-9">

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
    .bootstrap-datetimepicker-widget{
        z-index: 9999;
    }
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
        z-index: 1000;
        display: block;
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: left;
        /*text-align: start;*/
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.1.0/js/jquery.plugin.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.1.0/dist/jquery.countdown.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.0/bootstrap-slider.min.js"></script>

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
            $( "#filterForm" ).submit();
        }
        $('#datetimepicker1').change(function() {
            intervalTimer();
        });

        $('#filterForm').change(function() {
             intervalTimer();
        });

        Date.prototype.addDays = function(days) {
            this.setDate(this.getDate() + parseInt(days));
            return this;
        };

        var today = new Date().addDays(2);

        $('#datetimepicker').datetimepicker({
            inline: true,
            // sideBySide: true,
            useCurrent: false,
            minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate(), today.getHours(), today.getMinutes()),
            // autoclose: true,
            format: 'YYYY/MM/DD HH:mm'
        }, 9);

        $('#datetimepicker1').datetimepicker({
            useCurrent: false,
            minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate(), today.getHours(), today.getMinutes()),
            autoclose: true,
            format: 'YYYY/MM/DD',
            // inline: false,
            // sideBySide: false
        }, 9);
        $('#datetimepicker2').datetimepicker({
            useCurrent: false,
            minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
            autoclose: true,
            format: 'YYYY/MM/DD'
        });

        $("#datetimepicker1").on("change.datetimepicker", function (e) {
            $('#datetimepicker2').datetimepicker('minDate', e.date);
             intervalTimer();
        });
        $("#datetimepicker2").on("change.datetimepicker", function (e) {
            $('#datetimepicker1').datetimepicker('maxDate', e.date);
            intervalTimer();
        });

        if ($('#datetimepicker1').data().date != null){
            $('#datetimepicker2').datetimepicker('minDate', $('#datetimepicker1').data().date);
        }
    });
</script>
@endpush