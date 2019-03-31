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

                        check if event min is made

                        else check if payment is recured

                        else pendig on recured payment
                        <br>
                        {{--{!! $order !!}--}}

                        {!! $order->ticket_amount !!}
                        <br>
                        <br>
                        {!! $order->total_paid !!}
                        <br>
                        <br>
                        {!! $order->payment_id !!}
                        <br>
                        <br>
                        {!! $order->status !!}
                        <br>
                        <br>
                        {!! $order->event !!}
                        <br>
                        <br>
                        {!! $order->event->status !!}

                        <br>
                        <br>
                        <a class="btn btn-success">download</a>
                        <a class="btn btn-success">bekijken</a>

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
