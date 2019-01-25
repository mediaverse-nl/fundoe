@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.activity.index') !!}
@endsection

@section('content')

    <!-- DataTables Example -->
    @component('components.datatable', ['title' => 'events'])
        @slot('head')
            <th>id</th>
            <th>titel</th>
            <th>regio</th>
            <th>start</th>
            <th>duur</th>
            <th>prijs</th>
            <th>tickets</th>
            {{--<th>created_at</th>--}}
            {{--<th>updated_at</th>--}}
            {{--<th>deleted_at</th>--}}
            <th class="no-sort"></th>
        @endslot
        @slot('table')
            @foreach($events as $event)
                <tr>
                    <td>{!! $event->id !!}</td>
                    <td>{!! $event->activity->title !!}</td>
                    <td>{!! $event->activity->region !!}</td>
                    <td>{!! $event->start_datetime->format('d-m-y h:i') !!}</td>
                    <td>{!! $event->diffInTime() !!}min</td>
                    <td>€{!! number_format($event->price, 2)!!}</td>
                    <td>{!! $event->orders()->count() !!}/{!! $event->activity->min_number_of_people !!}~{!! $event->activity->max_number_of_people !!}</td>
                    {{--<td>{!! $event->created_at !!}</td>--}}
                    {{--<td>{!! $event->updated_at !!}</td>--}}
{{--                    <td>{!! $event->deleted_at !!}</td>--}}
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