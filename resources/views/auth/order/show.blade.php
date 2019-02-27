@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('auth.order.show', $order) !!}
@endsection

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('auth.includes.menu')
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Bestelling</h2>
                        <br>
                        {!! $order !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
@endsection

@push('css')
    <link href="{{ asset('/css/auth/app.css') }}" rel="stylesheet">
@endpush

@push('js')

@endpush
