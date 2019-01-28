@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.faq.index') !!}
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
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @component('components.model', [
                                    'id' => 'userTableBtn'.$user->id,
                                    'title' => 'Delete',
                                    'actionRoute' => route('admin.user.destroy', $user->id),
                                    'btnClass' => 'rounded-circle delete',
                                    'btnIcon' => 'fa fa-trash'
                                ])
                                    @slot('description')
                                        If u proceed u will delete all relations
                                    @endslot
                                @endcomponent
                                <a href="{{route('admin.user.edit', $user->id)}}" class="rounded-circle edit">
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