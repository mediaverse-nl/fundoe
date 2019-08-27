@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('auth.account.edit') !!}
@endsection

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-lg-3">
                @include('auth.includes.menu')
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                @component('components.card')
                    <h2>Credit Terugboeken</h2>

                    {!! Form::label('credit', 'te goed') !!}
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">&euro;</span>
                            </div>
                            {!! Form::number('credit', number_format(auth()->user()->credit, 2), ['class' => 'form-control'.(!$errors->has('gebruikersnaam') ? '': ' is-invalid '), 'disabled', 'step' => 'any']) !!}
                        </div>
                        <small>
                            Het te goed kan gebruikt woorden om je bij een event te registeren. <br>
                            Het te goed kan alleen gebruikt worden als het te goed bedrag hoger is dan de prijs van het event.<br>
                            Het te goed word automatisch gebruikt. <br>
                        </small>
                    </div>

                    @if(!(auth()->user()->credit <= 5))
                        @component('components.model', [
                            'btnClass' => 'btn btn-primary',
                            'btnTitle' => 'Terugboeken',
                            'id' => 'terugboeken',
                            'title' => 'Terugboeken',
                            'actionRoute' => route('home')
                        ])
                            @slot('description')

                                {!! Form::model(auth()->user(), ['route' => ['auth.account.chargeback'], 'method' => 'PATCH']) !!}

                                <div class="form-group">
                                    {!! Form::label('credit', 'Credit') !!}
                                    {!! Form::number('credit', number_format(auth()->user()->credit, 2), ['class' => 'form-control', 'disabled', 'step' => 'any']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('name', 'Naam') !!}
                                    {!! Form::text('name', substr(auth()->user()->first_name, 0, 1).'. '.auth()->user()->last_name, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('iban', 'IBAN') !!}
                                    {!! Form::text('iban', null, ['class' => 'form-control', 'required']) !!}
                                </div>

                                {!! Form::submit('aanvragen', ['class' => 'btn btn-primary', 'style' => "border-radius: 0px;"]) !!}
                                {!! Form::close() !!}
                            @endslot
                        @endcomponent
                    @else
                        <a class="btn btn-dark disabled"  style="color: #FFFFFF;">
                             {{ auth()->user()->chargeBacks()->where('status', '=', 0)->count() ? 'Terugboeking inbehandeling' : 'Terugboeken'}}
                        </a>
                    @endif
                    {{--<button type="submit" class="btn btn-primary">Terugboeken</button>--}}
                    <br>
                    <small>
                        *Bij het terugstorten van het credit naar uw eigen bank worden er administratiekosten inrekening gebracht <b>&euro;3.50</b>.
                        <br>
                        *Terugboeking is te verwachten binnen <b>7</b> werkdagen.
                    </small>

                    <div class="form-group">
                        @include('components.error', ['field' => 'gebruikersnaam'])
                    </div>

                    <hr>
                    <h2>Watchwoord wijzigen</h2>

                    {!! Form::model(auth()->user(), ['route' => ['auth.account.password'], 'method' => 'PATCH']) !!}
                        <div class="form-group">
                            {!! Form::label('email', 'E-Mail adres') !!}
                            {!! Form::text('email', auth()->user()->email, ['class' => 'form-control', 'disabled']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('wachtwoord', 'wachtwoord') !!}
                            {!! Form::password('wachtwoord', ['class' => 'form-control'.(!$errors->has('wachtwoord') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'wachtwoord'])
                        </div>
                        <div class="form-group">
                            {!! Form::label('herhaal_wachtwoord', 'herhaal wachtwoord') !!}
                            {!! Form::password('herhaal_wachtwoord', ['class' => 'form-control'.(!$errors->has('herhaal_wachtwoord') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'herhaal_wachtwoord'])
                        </div>
                        <button type="submit" class="btn btn-primary">Opslaan</button>
                    {!! Form::close() !!}

                @endcomponent

                <br>

                @component('components.card')
                    {!! Form::model(auth()->user(), ['route' => ['auth.account.info'], 'method' => 'PATCH']) !!}

                        @if($errors->any())
                            <h4>{!! $errors->first() !!}</h4>
                        @endif

                        <h2>Gegevens</h2>

                        <div class="form-group">
                            {!! Form::label('gebruikersnaam', 'gebruikersnaam') !!}
                            {!! Form::text('gebruikersnaam', auth()->user()->name, ['class' => 'form-control'.(!$errors->has('gebruikersnaam') ? '': ' is-invalid '), 'disabled']) !!}
                            @include('components.error', ['field' => 'gebruikersnaam'])
                        </div>

                        {!! Form::label('telefoon_nr', 'telefoon nr') !!}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+31 6</span>
                                </div>
                                {!! Form::text('telefoon_nr', auth()->user()->phone_nr, ['class' => 'form-control'.(!$errors->has('telefoon_nr') ? '': ' is-invalid ')]) !!}
                            </div>
                            @include('components.error', ['field' => 'telefoon_nr'])
                        </div>
                        {{--<amall class="text-muted">+31 6 xxxxxxxx</amall>--}}
                        <div class="form-group">
                            {!! Form::label('voornaam', 'voornaam *') !!}
                            {!! Form::text('voornaam', auth()->user()->first_name, ['class' => 'form-control'.(!$errors->has('voornaam') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'voornaam'])
                        </div>
                        <div class="form-group">
                            {!! Form::label('achternaam', 'achternaam *') !!}
                            {!! Form::text('achternaam', auth()->user()->last_name, ['class' => 'form-control'.(!$errors->has('achternaam') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'achternaam'])
                        </div>
                        <div class="form-group">
                            {!! Form::label('land', 'land') !!}
                            {!! Form::text('land', auth()->user()->country, ['class' => 'form-control'.(!$errors->has('land') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'land'])
                        </div>
                        <div class="form-group">
                            {!! Form::label('stad', 'stad *') !!}
                            {!! Form::text('stad', auth()->user()->city, ['class' => 'form-control'.(!$errors->has('stad') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'stad'])
                        </div>
                        <div class="form-group">
                            {!! Form::label('postcode', 'postcode *') !!}
                            {!! Form::text('postcode', auth()->user()->zipcode, ['class' => 'form-control'.(!$errors->has('postcode') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'postcode'])
                        </div>
                        <div class="form-group">
                            {!! Form::label('straat', 'straat *') !!}
                            {!! Form::text('straat',  auth()->user()->street_name, ['class' => 'form-control'.(!$errors->has('straat') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'straat'])
                        </div>
                        <div class="form-group">
                            {!! Form::label('straat_nr', 'straat nr *') !!}
                            {!! Form::text('straat_nr', auth()->user()->street_nr, ['class' => 'form-control'.(!$errors->has('straat_nr') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'straat_nr'])
                        </div>

                        <button type="submit" class="btn btn-primary">Opslaan</button>
                    {!! Form::close() !!}

                @endcomponent

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>

    <br>

@endsection

@push('css')
@endpush

@push('js')
@endpush
