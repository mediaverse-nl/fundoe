@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.order.index') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-12">

            @component('components.datatable')
                @slot('head')
                    <th>id</th>
                    <th>email</th>
                    <th>ticket_amount</th>
                    <th>price</th>
                    <th>payment_id</th>
                    <th>status</th>
                    <th class="no-sort"></th>
                @endslot

                @slot('table')
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->ticket_amount}}x</td>
                            <td>{{number_format($order->total_paid, 2)}}</td>
                            <td>{{$order->payment_id}}</td>
                            <td>{{$order->status}}</td>
                            <td>
                                <a href="{{route('admin.order.show', $order->id)}}" class="rounded-circle edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endslot

            @endcomponent

        </div>
    </div>

@endsection

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush