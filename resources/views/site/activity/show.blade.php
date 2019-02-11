@extends('layouts.app')

@section('breadcrumb')
    {{--{!!  dd($event) !!}--}}
    {!! Breadcrumbs::render('site.activity.show', $event) !!}
@endsection

@section('content')
    <div class="container product-page">
        <div class="row">

            <div class="col-12">
                {{--<div class="card">--}}
                    {{--<div class="container-fliud">--}}
                        <div class="wrapper row">
                            <div class="preview col-md-6">

                                <div class="preview-pic tab-content square shadow">
                                    @foreach($event->activity->images() as $img)
                                        <div class="tab-pane square-inn {!! $loop->first ? 'active' : null !!} show" id="pic-{!! $loop->index+1 !!}">
                                            <img src="{!! $img !!}" class=""/>
                                        </div>
                                    @endforeach
                                </div>

                                <ul class="preview-thumbnail nav nav-tabs ">
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
                                </ul>

                            </div>
                            <div class="details col-md-6">
                                <h1 class="product-title">{!! $event->activity->title !!}</h1>
                                <div class="rating">
                                    <div class="stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    {{--<span class="review-no">{!! $event !!} reviews</span>--}}
                                </div>
                                {{--<p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>--}}
                                <h4 class="price">Prijs p.p. <span>{!! $event->activity->price !!}</span></h4>
                                {{--<p class="vote"><strong>91%</strong> of buyers enjoyed this activity! <strong>(87 votes)</strong></p>--}}
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
                                        <br>
                                        <div class="form-group">
                                            <b>Start op</b><br>
                                            {!! $event->start_datetime->format('d-m-y h:i') !!}
                                        </div>
                                        {{--<b>Eindigt over: </b><br>--}}
                                        <div id="countdown" data-countdown="{!! $event->timeToOrder('Y/m/d H:i:s') !!}" style="border: 1px solid #cccccc; margin-bottom: 20px; padding: 10px 0; text-align: center;">46 weeks 6 days 20h 44m 31s</div>
                                        {{--<h3 class="" style="" data-countdown="{!! $event->timeToOrder('Y/m/d H:i:s') !!}">{!! $event->timeToOrder('Y/m/d H:i:s') !!}</h3>--}}

                                        {!! Form::open(['route' => ['site.order.store.public'], 'method' => 'POST']) !!}

                                        <div class="form-group">
                                            <h3><small>Prijs </small> € {!! $event->price !!} <small>p.p.</small></h3>
                                            <input id="pricePerHourGroup" style="display: none;" value="{!! $event->price !!}">
                                        </div>

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
                                        <br>
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

    <div class="container-fluid review-container">
        <div class="row">

            @foreach($event->activity->reviews as $review)

                <div class="col-3">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{!! $review->user->name !!}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">{!! $review->text !!}</p>
                            <a href="#" class="card-link">
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9732; &#9734;</small>
                            </a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>

                </div>
            @endforeach
            </div>
        </div>
    </div>

@endsection

@push('css')
    <link href="{{ asset('/css/site/activity.css') }}" rel="stylesheet">
    <style>
        .tab-pane{
            background: #FFFFFF;
            padding: 15px;
            border: 1px solid #dee2e6 ;
            border-top: none !important;
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function(){
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
