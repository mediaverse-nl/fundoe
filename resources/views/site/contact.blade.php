@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('site.contact') !!}
@endsection

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-6">

                @component('components.card')
                    <h1>{!! Editor('contact_form_title', 'text', false, 'Contactformulier') !!}</h1>

                    <p class="lead">{!! Editor('contact_form_description', 'richtext', false, 'This is a demo for our tutorial dedicated to crafting working.') !!}</p>

                    <!-- We're going to place the form here in the next step -->
                    <div class="messages">
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                    </div>

                    <div class="controls">
                        {!! Form::open(['route' => ['site.contact.store'], 'method' => 'POST']) !!}

                        <h2>Gegevens</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('voornaam', 'Voornaam *') !!}
                                    {!! Form::text('voornaam', !auth()->check() ? null : auth()->user()->first_name, ['class' => 'form-control'.(!$errors->has('voornaam') ? '': ' is-invalid ')]) !!}
                                    @include('components.error', ['field' => 'voornaam'])
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('voornaam', 'Achternaam *') !!}
                                    {!! Form::text('achternaam', !auth()->check() ? null : auth()->user()->last_name, ['class' => 'form-control'.(!$errors->has('achternaam') ? '': ' is-invalid ')]) !!}
                                    @include('components.error', ['field' => 'achternaam'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('email', 'E-mail *') !!}
                                    {!! Form::text('email', !auth()->check() ? null : auth()->user()->email, ['class' => 'form-control'.(!$errors->has('email') ? '': ' is-invalid ')]) !!}
                                    @include('components.error', ['field' => 'email'])
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('onderwerp', 'Onderwerp *') !!}
                                    {!! Form::select('onderwerp', [
                                        'Vraag offerte aan' => 'Vraag offerte aan',
                                        'Verzoek om event met specifieke datum' => 'Verzoek om event met specifieke datum',
                                        'Verzoek om orderstatus' => 'Verzoek om orderstatus',
                                        'Anders' => 'Anders',
                                    ], null, ['placeholder' => '---', 'class' => 'form-control'.(!$errors->has('onderwerp') ? '': ' is-invalid ')]) !!}
                                    @include('components.error', ['field' => 'onderwerp'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('bericht', 'Bericht / Opmerking *') !!}
                                    {!! Form::textarea('bericht', null, ['rows="5"','class' => 'form-control'.(!$errors->has('bericht') ? '': ' is-invalid ')]) !!}
                                    @include('components.error', ['field' => 'bericht'])
                                </div>
                            </div>
                            <div class="col-md-12">
                                {!! Form::submit('Verstuur', ['class' => 'btn btn-success btn-send btn-block']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted">
                                    <strong>*</strong> Deze velden zijn verplicht.
                                </p>
                            </div>
                        </div>

                        {!! Form::close() !!}
                   </div>
               @endcomponent

           </div>
           <div class="col-6">
               {{--<div class="card" style="border-radius: 0px; height: 320px; ">--}}
                   {{--<iframe width="100%" height="100%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=daalakkersweg+2.182&key=AIzaSyAEBiBb3bt-BPv07wGskZaTHcwSIk97xUg" allowfullscreen></iframe>--}}
               {{--</div>--}}
               {{--<br>--}}
               @component('components.card')
                   {!! Editor('contact_info_text', 'richtext', false, '
                   Title van dit stuck
Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker.

Maandag	09.00 - 18.00
Dinsdag	09.00 - 18.00
Woensdag	09.00 - 18.00
Donderdag	09.00 - 18.00
Vrijdag	09.00 - 18.00
Zaterdag	09.00 - 18.00
Zondag	09.00 - 18.00  ') !!}
                @endcomponent
            </div>

        </div>
    </div>

    <br>

@endsection

@push('css')

@endpush

@push('js')

@endpush
