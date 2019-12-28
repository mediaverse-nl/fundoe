@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.activity.index') !!}
@endsection

@section('content')

    <!-- DataTables Example -->
    @component('components.datatable')
        @slot('head')
            <th>id</th>
            <th>activiteit</th>
            <th>sold tickets</th>
            <th>regions</th>
            <th>price_per_hour</th>
            <th>events running</th>
            <th class="no-sort"></th>
        @endslot
        @slot('table')
            @foreach($activities as $activity)
                <tr class="{!! $activity->trashed() ? 'table-danger' : '' !!}">
                    <td>{!! $activity->id !!}</td>
                    <td>{!! $activity->title !!}</td>
                    <td>1/{!! $activity->min_number_of_people !!}~{!! $activity->max_number_of_people !!}</td>
                    <td>{!! $activity->region !!}</td>
                    <td>{!! number_format($activity->price_per_hour, 2) !!}</td>
                    <td>{!! $activity->currentlyRunningEvents() !!}x</td>
                    <td>
                        @component('components.model', [
                               'id' => 'userTableBtn'.$activity->id,
                               'title' => ($activity->trashed() ? 'Restore' : 'Delete').' entry '.$activity->id,
                               'actionRoute' => route('admin.activity.destroy', $activity->id),
                               'btnClass' => 'rounded-circle delete',
                               'btnIcon' => 'fa '.($activity->trashed() ? 'fa-undo' : 'fa-trash')
                           ])
                            @slot('description')
                                If u proceed u will <b>{!! $activity->trashed() ? 'restore' : 'delete' !!}</b> all relations
                            @endslot
                        @endcomponent
                        <a href="{{route('admin.activity.edit', $activity->id)}}" class="rounded-circle edit">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent

@endsection

@push('css')
    <style></style>
@endpush

@push('scripts')
    <script></script>
@endpush