@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('auth.panel') !!}
@endsection

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-lg-3">
                @include('auth.includes.menu')
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100" style="overflow: hidden;">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-user"></i>
                                </div>
                                <div class="mr-5">Account wijzigen</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="{!! route('auth.account.edit') !!}">
                                <span class="float-left">Bekijken</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100" style="overflow: hidden;">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-shopping-cart"></i>
                                </div>
                                <div class="mr-5">Bestelling(en)</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="{!! route('auth.order.index') !!}">
                                <span class="float-left">Bekijken</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-12 col-sm-12 mb-12">
                        <div class="card">
                            <div class="card-header">
                                {{--<i class="fas fa-table"></i>--}}
                                account
                            </div>
                            <div class="card-body">

                                {!! Form::model(Auth::user(), ['class' => 'form-horizontal']) !!}
                                    <div class="form-group row">
                                        {!! Form::label('name', 'Gebruikersnaam', ['class' => 'col-sm-3 flout-right']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('name', null, ['class' => 'form-control', 'disabled']) !!}
                                         </div>
                                     </div>
                                    <div class="form-group row">
                                        {!! Form::label('email', 'E-mail', ['class' => 'col-sm-3']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('email', null, ['class' => 'form-control', 'disabled']) !!}
                                         </div>
                                     </div>
                                    <div class="form-group row">
                                        {!! Form::label('first_name', 'Voornaam', ['class' => 'col-sm-3']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('first_name', null, ['class' => 'form-control', 'disabled']) !!}
                                         </div>
                                     </div>
                                    <div class="form-group row">
                                        {!! Form::label('last_name', 'Achternaam', ['class' => 'col-sm-3']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('last_name', null, ['class' => 'form-control', 'disabled']) !!}
                                         </div>
                                     </div>
                                    <div class="form-group row">
                                        {!! Form::label('country', 'Land', ['class' => 'col-sm-3']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('country', null, ['class' => 'form-control', 'disabled']) !!}
                                         </div>
                                     </div>
                                    <div class="form-group row">
                                        {!! Form::label('city', 'Stad', ['class' => 'col-sm-3']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('city', null, ['class' => 'form-control', 'disabled']) !!}
                                         </div>
                                     </div>
                                    <div class="form-group row">
                                        {!! Form::label('zipcode', 'Postcode', ['class' => 'col-sm-3']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('zipcode', null, ['class' => 'form-control', 'disabled']) !!}
                                         </div>
                                     </div>
                                    <div class="form-group row">
                                        {!! Form::label('street_name', 'Adres', ['class' => 'col-sm-3']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('street_name', null, ['class' => 'form-control', 'disabled']) !!}
                                         </div>
                                     </div>
                                    <div class="form-group row">
                                        {!! Form::label('street_nr', 'Adres nr', ['class' => 'col-sm-3']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::text('street_nr', null, ['class' => 'form-control', 'disabled']) !!}
                                         </div>
                                     </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    
    <br>

@endsection

@push('css')
    <style>
        .card-body-icon {
            position: absolute;
            z-index: 0;
            top: -1.25rem;
            right: -1rem;
            opacity: 0.4;
            font-size: 5rem;
            -webkit-transform: rotate(15deg);
            transform: rotate(15deg);
        }
    </style>
@endpush

@push('js')

@endpush
