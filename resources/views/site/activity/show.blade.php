@extends('layouts.app')

@section('breadcrumb')
     {!! Breadcrumbs::render('site.activity.show', $event) !!}
@endsection

@section('content')
    <div class="container product-page">
        <div class="row">

            <div class="col-12">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content square shadow">
                            {{--{!! dd($event->activity->images()) !!}--}}
                            @if($event->activity->images() != null)
                                @foreach($event->activity->images() as $img)
                                    <div class="tab-pane square-inn {!! $loop->first ? 'active' : null !!} show" id="pic-{!! $loop->index+1 !!}">
                                        <img src="{!! $img !!}" class=""/>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <ul class="preview-thumbnail nav nav-tabs ">
                            @if($event->activity->images() != null)
                                @foreach($event->activity->images() as $img)
                                     <li>
                                         <a data-target="#pic-{!! $loop->index+1 !!}" data-toggle="tab" class=" {!! $loop->first ? '' : null !!} show">
                                             <div class="square shadow">
                                                 <div class="square-inn">
                                                     <img src="{!! $img !!}" />
                                                 </div>
                                             </div>
                                         </a>
                                     </li>
                                 @endforeach
                            @endif
                        </ul>
                        <br>
                        <div class="social-icons">
                            <b>Deel het met je vriend(en)</b>
                            <br>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={!! 'fundoe.nl/'.request()->path() !!}" class="fa fa-facebook"></a>
                            <a href="https://twitter.com/intent/tweet?text={!! $event->activity->title. ' - ' .$event->activity->description  !!}&amp;url={!! 'fundoe.nl/'.request()->path() !!}" class="fa fa-twitter"></a>
                            <a href="https://plus.google.com/share?url={!! 'fundoe.nl/'.request()->path() !!}" class="fa fa-google"></a>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={!! 'fundoe.nl/'.request()->path() !!}&amp;title={!! $event->activity->title  !!}&amp;summary={!! $event->activity->description  !!}" class="fa fa-linkedin"></a>
                        </div>
                        <br>
                    </div>
                    <div class="details col-md-6">
                        <h1 class="product-title">{!! $event->activity->title !!}</h1>
                        <div class="form-group">
                             <b>Regio</b><br>
                            {!! $event->activity->region !!}
                        </div>

                        <div class="form-group">

                            {{--{!! $errors->first('*') !!}--}}
                            <b>Beschrijving</b><br>
                            {!! $event->activity->description !!}
                        </div>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {!! Session::has('activityType') ? (Session::get('activityType') == 'public' ? 'active':'') : 'active'!!}" id="public-tab" data-toggle="tab" href="#public{!! $event->id !!}" role="tab" aria-controls="public" aria-selected="true">Publieke activiteit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {!! Session::has('activityType') ? (Session::get('activityType') == 'group' ? 'active':'') : ''!!}" id="group-tab" data-toggle="tab" href="#group{!! $event->id !!}" role="tab" aria-controls="group" aria-selected="false">Groups activiteit</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane {!! Session::has('activityType') ? (Session::get('activityType') == 'public' ? 'active show':'') : 'show active'!!}" id="public{!! $event->id !!}" role="tabpanel" aria-labelledby="public-tab">
                                <div class="form-group">
                                    <h3><small>Prijs </small> € {!! $event->price !!} <small>p.p.</small></h3>
                                    <input id="pricePerHourGroup" style="display: none;" value="{!! $event->price !!}">
                                </div>
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <b>Start op</b><br>
                                            {!! $event->start_datetime->format('d-m-y h:i') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <b>Doel</b><br>
                                            {!! $event->countSoldTickets() !!} / {!! $event->activity->min_number_of_people .' ~'. $event->activity->max_number_of_people !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <b>Doelgroep</b><br>
                                                {!! $event->target_group !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <b>Tot aanmelding sluit</b>

                                <div id="countdown" data-countdown="{!! $event->timeToOrder('Y/m/d H:i:s') !!}" style="border: 1px solid #cccccc; margin-bottom: 20px; padding: 10px 0; text-align: center;"></div>

                                {!! Form::open(['route' => ['site.order.store.public'], 'method' => 'POST']) !!}

                                <div class="form-group">
                                    <b>Tickets</b>
                                    {!! Form::select('tickets', array_combine($event->publicTicketSelection(), $event->publicTicketSelection()), null, ['class' => 'form-control'.(!$errors->has('tickets') ? '': ' is-invalid ')]) !!}
                                    @include('components.error', ['field' => 'tickets'])
                                </div>

                                <div class="custom-control custom-checkbox">
                                    {!! Form::checkbox('voorwaarden', null, false,['class' => 'custom-control-input'.(!$errors->has('voorwaarden') ? '': ' is-invalid '), 'id' => 'algemeneVoorwaarden'.$event->id]) !!}
                                    <label class="custom-control-label" for="{!! 'algemeneVoorwaarden'.$event->id !!}">
                                        Ik ga akkoord met de met de <a href="{!! route('site.terms') !!}"><b>algemene voorwaarden</b></a> en
                                        <a href="{!! route('site.privacy') !!}"><b>privacy verklaring</b></a> van fundoe.nl
                                    </label>
                                    @include('components.error', ['field' => 'voorwaarden'])
                                </div>
                                <br>

                                <input type="submit" class="btn btn-block btn-success" value="betalen">
                                {!! Form::close() !!}
                            </div>
                            <div class="tab-pane {!! Session::has('activityType') ? (Session::get('activityType') == 'group' ? 'active show':'') : ''!!}" id="group{!! $event->id !!}" role="tabpanel" aria-labelledby="group-tab">

                                {!! Form::open(['route' => ['site.order.store.group'], 'method' => 'POST']) !!}


                                <div class="form-group">
                                    <h3><small>Prijs per uur </small> € {!! $event->activity->price_per_hour !!} <small>p.p.</small></h3>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <b>Aantal tickets</b>
                                        {!! Form::select('tickets', array_combine($event->groupTicketSelection(),$event->groupTicketSelection()), null, ['class' => 'form-control'.(!$errors->has('tickets') ? '': ' is-invalid '), 'id' => 'selectedAmountGroup']) !!}
                                        @include('components.error', ['field' => 'tickets'])
                                    </div>

                                    <div class="form-group col-md-6">
                                        <b>Duur van activiteit</b>
                                        {!! Form::select('duur', array_combine($event->groupDurationSelection(), $event->groupDurationSelection()), null, ['class' => 'form-control'.(!$errors->has('tickets') ? '': ' is-invalid '), 'id' => 'selectedDurationGroup']) !!}
                                        @include('components.error', ['field' => 'duur'])
                                    </div>
                                </div>

                                <div class="form-group">
                                    <b>Selecteer een datum en tijd</b>
                                    <div class="input-group datetimepicker{!! (!$errors->has('activiteit_datum') ? '': ' is-invalid ') !!}" id="datetimepicker" data-target-input="nearest" data-date-min-date="0" data-date-today-highlight="true" data-date-format="YYYY-MM-DD HH:mm" style="margin-bottom: 5px; border-radius: 5px;">
                                        <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker"  style="-moz-border-radius-bottomleft: .25rem;">
                                            <div class="input-group-text" style="border-right: none;"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        {!! Form::text('activiteit_datum', null, ['class' => 'datetimepicker-input form-control'.(!$errors->has('activiteit_datum') ? '': ' is-invalid '), 'data-toggle' => 'datetimepicker', 'data-target' => '#datetimepicker', 'autocomplete' => 'off']) !!}
                                    </div>
                                    @include('components.error', ['field' => 'activiteit_datum'])

                                </div>

                                <div class="custom-control custom-checkbox">
                                    {!! Form::checkbox('voorwaarden', null, false,['class' => 'custom-control-input'.(!$errors->has('voorwaarden') ? '': ' is-invalid '), 'id' => 'algemeneVoorwaardenA'.$event->id]) !!}
                                    <label class="custom-control-label" for="{!! 'algemeneVoorwaardenA'.$event->id !!}">
                                        Ik ga akkoord met de met de <a href="{!! route('site.terms') !!}"><b>algemene voorwaarden</b></a> en
                                        <a href="{!! route('site.privacy') !!}"><b>privacy verklaring</b></a> van fundoe.nl
                                    </label>
                                    @include('components.error', ['field' => 'voorwaarden'])
                                </div>
                                <br>
                                 <input type="submit" class="btn btn-block btn-success" value="betalen">

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <br>

    {{--<div class="container-fluid review-container">--}}
        {{--<div class="row">--}}

            {{--@foreach($event->activity->reviews as $review)--}}

                {{--<div class="col-3">--}}

                    {{--<div class="card">--}}
                        {{--<div class="card-body">--}}
                            {{--<h5 class="card-title">{!! $review->user->name !!}</h5>--}}
                            {{--<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>--}}
                            {{--<p class="card-text">{!! $review->text !!}</p>--}}
                            {{--<a href="#" class="card-link">--}}
                                {{--<small class="text-muted">&#9733; &#9733; &#9733; &#9732; &#9734;</small>--}}
                            {{--</a>--}}
                            {{--<a href="#" class="card-link">Another link</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection

@push('css')
    <link href="{{ asset('/css/site/activity.css') }}" rel="stylesheet">
    <style>
        .square-inn img{
            object-fit: cover !important;
            height: 100% !important;
        }
        .square-inn{
            height: 100% !important;
            padding: 0px !important;
            border: none !important;
        }
        .tab-pane{
            background: #FFFFFF;
            padding: 15px;
            border: 1px solid #dee2e6 ;
            border-top: none !important;
        }
        .tab-content{
            overflow: visible !important;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.1.0/js/jquery.plugin.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.1.0/dist/jquery.countdown.min.js"></script>



    <script type="text/javascript">
        $( document ).ready(function() {

            $("#countdown")
                .countdown("2017/01/01", function(event) {
                    $(this).text(
                        event.strftime('%D dagen %H:%M:%S uur')
                    );
                });

            $('[data-countdown]').each(function() {
                var $this = $(this), finalDate = $(this).data('countdown');
                $this.countdown(finalDate, function(event) {
                    $this.html(event.strftime('%D dagen %H:%M:%S uur'));
                });
            });




           var pricePerHourGroup = $("#pricePerHourGroup");
           var selectedAmountGroup = $("#selectedAmountGroup");
           var selectedDurationGroup = $("#selectedDurationGroup");
           var pricePerTicketGroup = pricePerHourGroup.val().replace(/\./g, ',') / 60;
        // * selectedDurationGroup .toString().replace(/\./g, ',')
           console.log('per uur '+pricePerHourGroup.val());
           console.log('aantal '+selectedAmountGroup.val());
           console.log('duur '+selectedDurationGroup.val());
           console.log('pricePerTicketGroup '+pricePerTicketGroup);
           console.log('totaal prijs '+(pricePerHourGroup.val() * selectedAmountGroup.val()));

            $( pricePerHourGroup ).change(function() {
                console.log(pricePerHourGroup.val());
                console.log((pricePerHourGroup.val() * selectedAmountGroup.val()));
            });
            $( selectedAmountGroup ).change(function() {
                console.log(pricePerHourGroup.val());
                console.log((pricePerHourGroup.val() * selectedAmountGroup.val()));
            });

        });

    </script>
@endpush
