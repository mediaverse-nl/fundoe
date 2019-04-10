@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('auth.order.index') !!}
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
                        <h2 class="">Bestellingen</h2>
                        <br>
                        <table id="table_id" class="display table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>start datum</th>
                                    <th>activiteit</th>
                                    <th>status</th>
                                    <th>opties</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach(auth()->user()->orders()->orderBy('id', 'DESC')->get() as $orders)
                                <tr>
                                    <td>
                                        {!! $orders->id !!}
                                    </td>
                                    <td>
                                        {!! $orders->event->start_datetime->format('d-m-Y - h:i') !!}
                                    </td>
                                    <td>
                                        {!! $orders->event->activity->title !!}
                                    </td>
                                    <td>
                                        {!! $orders->event->status !!}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="{!! route('auth.order.show', $orders->id) !!}">bekijken</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
    <script src="{{ asset('/js/auth/app.js') }}"></script>
@endpush
