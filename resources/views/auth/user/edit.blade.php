@extends('layouts.app')

@section('content')
    <br>

    <div class="container">

        <div class="row">

            <div class="col-lg-3">
                @include('auth.includes.menu')
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                @component('components.card')
                    {!! Form::model(auth()->user(), ['route' => ['auth.account.password'], 'method' => 'PATCH']) !!}
                        <h2>Account</h2>
                        <div class="form-group">
                            {!! Form::label('email', 'E-Mail adres') !!}
                            {!! Form::text('email', auth()->user()->email, ['class' => 'form-control', 'disabled']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('watchwoord', 'watchwoord') !!}
                            {!! Form::password('watchwoord', ['class' => 'form-control'.(!$errors->has('watchwoord') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'watchwoord'])
                        </div>
                        <div class="form-group">
                            {!! Form::label('herhaal_watchwoord', 'herhaal watchwoord') !!}
                            {!! Form::password('herhaal_watchwoord', ['class' => 'form-control'.(!$errors->has('herhaal_watchwoord') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'herhaal_watchwoord'])
                        </div>
                        <button type="submit" class="btn btn-primary">Opslaan</button>
                    {!! Form::close() !!}

                @endcomponent

                <br>

                @component('components.card')
                    {!! Form::model(auth()->user(), ['route' => ['auth.account.info'], 'method' => 'PATCH']) !!}

                        @if($errors->any())
                            <h4>{{$errors->first()}}</h4>
                        @endif

                        <h2>Gegevens</h2>

                        <div class="form-group">
                            {!! Form::label('adres', 'adres') !!}
                            {!! Form::text('adres', null, ['class' => 'form-control'.(!$errors->has('adres') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'adres'])
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
