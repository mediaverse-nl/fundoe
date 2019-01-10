@extends('layouts.app')

@section('content')
    <br>

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
                                    <th>Datum</th>
                                    <th>activiteit</th>
                                    <th>opties</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        1-9-2020
                                    </td>
                                    <td>
                                        Zaalvoetbal
                                    </td>
                                    <td>
                                        <a class="btn btn-sx btn-success" href="{!! route('auth.order.show', 1) !!}">bekijken</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        5-2-2020
                                    </td>
                                    <td>
                                        Zaalvoetbal
                                    </td>
                                    <td>
                                        <a class="btn btn-sx btn-success" href="{!! route('auth.order.show', 1) !!}">bekijken</a>
                                    </td>
                                </tr>
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
