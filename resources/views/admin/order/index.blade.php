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
                    <th>name</th>
                    <th>email</th>
                    <th class="no-sort"></th>
                @endslot

                @slot('table')
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>
                                @component('components.model', [
                                    'id' => 'orderTableBtn'.$order->id,
                                    'title' => 'Delete',
                                    'actionRoute' => route('admin.order.destroy', $order->id),
                                    'btnClass' => 'rounded-circle delete',
                                    'btnIcon' => 'fa fa-trash'
                                ])
                                    @slot('description')
                                        If u proceed u will delete all relations
                                    @endslot
                                @endcomponent
                                <a href="{{route('admin.order.edit', $order->id)}}" class="rounded-circle edit">
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