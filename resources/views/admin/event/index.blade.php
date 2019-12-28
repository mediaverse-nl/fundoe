@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.event.index') !!}
@endsection

@section('content')

    <!-- DataTables Example -->
    @component('components.datatable')
        @slot('head')
            <th>id</th>
            <th>titel</th>
            <th>regio</th>
            <th>start</th>
            <th>duur</th>
            <th>prijs</th>
            <th>tickets</th>
            <th class="no-sort"></th>
        @endslot
        @slot('table')
            @foreach($events as $event)
                <tr class="{!!  \Carbon\Carbon::now() > $event->start_datetime  ? 'table-dark' : ''!!}
                        {!!  \Carbon\Carbon::now()->addHours(48) > $event->start_datetime ? 'table-danger' : ''!!}
                        {!!  \Carbon\Carbon::now()->addHours(100) > $event->start_datetime ? 'table-warning' : ''!!}">
                    <td>{!! $event->id !!}</td>
                    <td>{!! !empty($event->activity['title']) ? $event->activity->title : '' !!}</td>
                    <td>{!! !empty($event->activity['region']) ? $event->activity->region : ''  !!}</td>
                    <td>{!! $event->start_datetime->format('d-m-y h:i') !!}</td>
                    <td>{!! $event->diffInTime() !!}min</td>
                    <td>€{!! number_format($event->price, 2)!!}</td>
                    <td>
                        {!! $event->countSoldTickets() !!}/
                        {!! !empty($event->activity['min_number_of_people']) ? $event->activity->min_number_of_people : ''  !!}~
                        {!! !empty($event->activity['max_number_of_people']) ? $event->activity->max_number_of_people : ''  !!}
{{--                        {!! $event->activity->min_number_of_people !!}--}}
{{--                        {!! $event->activity->max_number_of_people !!}--}}
                    </td>
                    <td>
                        @component('components.model', [
                                'id' => 'eventTableBtn'.$event->id,
                                'title' => 'Delete',
                                'actionRoute' => route('admin.event.destroy', $event->id),
                                'btnClass' => 'rounded-circle delete',
                                'btnIcon' => 'fa fa-trash'
                            ])
                            @slot('description')
                                If u proceed u will delete all relations
                            @endslot
                        @endcomponent
                        <a href="{{route('admin.event.edit', $event->id)}}" class="rounded-circle edit">
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