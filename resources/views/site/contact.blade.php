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
                    <div class="messages"></div>

                    <div class="controls">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">Voornaam *</label>
                                    <input id="first_name" type="text" name="first_name" value="{!! !auth()->check() ? '' : auth()->user()->first_name !!}" class="form-control">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Achternaam *</label>
                                    <input id="last_name" type="text" name="last_name" value="{!! !auth()->check() ? '' : auth()->user()->last_name !!}" class="form-control" >
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_email">E-mail *</label>
                                    <input id="form_email" type="email" name="email" value="{!! !auth()->check() ? '' : auth()->user()->email !!}" class="form-control">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_need">Onderwerp *</label>
                                    <select id="form_need" name="need" class="form-control">
                                        <option value=""> --- </option>
                                        <option value="Vraag offerte aan">Vraag offerte aan</option>
                                        <option value="Verzoek om orderstatus">Verzoek om event met specifieke datum</option>
                                        <option value="Verzoek om orderstatus">Verzoek om orderstatus</option>
                                        <option value="Anders">Anders</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Bericht / Opmerking *</label>
                                    <textarea id="form_message" name="message" class="form-control" rows="4"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success btn-send btn-block" value="Verstuur">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted">
                                    <strong>*</strong> Deze velden zijn verplicht.
                                </p>
                            </div>
                        </div>
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
