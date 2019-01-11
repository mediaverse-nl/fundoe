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
                        <div class="form-group {!! !$errors->has('email') ? : 'has-warning'!!}">
                            {!! Form::label('email', 'E-Mail adres') !!}
                            {!! Form::text('email', null, ['class' => 'form-control', 'disabled']) !!}
                        </div>
                        <div class="form-group {!! !$errors->has('watchwoord') ? : 'has-error'!!} has-warning">
                            {!! Form::label('watchwoord', 'watchwoord') !!}
                            {!! Form::password('watchwoord', ['class' => 'form-control'. !$errors->has('watchwoord') ? : ' is_invalid']) !!}
                            @include('components.error', ['field' => 'watchwoord'])
                        </div>
                        <div class="form-group {!! !$errors->has('herhaal_watchwoord') ? : 'has-error'!!}">
                            {!! Form::label('herhaal_watchwoord', 'herhaal_watchwoord') !!}
                            {!! Form::password('herhaal_watchwoord', ['class' => 'form-control']) !!}
                            @include('components.error', ['field' => 'herhaal_watchwoord'])
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputPassword1">Password</label>--}}
                            {{--<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">--}}
                        {{--</div>--}}
                        {{--<div class="form-check">--}}
                            {{--<input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
                            {{--<label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
                        {{--</div>--}}
                        <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}

                @endcomponent

                <br>

                @component('components.card')
                    <h2>Gegevens</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="" placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
