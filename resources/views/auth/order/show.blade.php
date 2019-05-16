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

                        We hebben uw bestelling goed ontvangen
                        <br>
                        <br>
                        Zie hier uw factuur
                        <br>
                        <a class="btn btn-success text-white" href="{!! route('auth.order.download', $order->id) !!}" >download</a>
                        <a class="btn btn-success text-white" href="{!! route('auth.order.view', $order->id) !!}" target="_black">bekijken</a>

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
