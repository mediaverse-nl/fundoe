@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.activity.index') !!}
@endsection

@section('content')

    <!-- DataTables Example -->
    @component('components.datatable', ['title' => 'activity'])
        @slot('head')
            <th>Pagina</th>
            <th>Position</th>
        @endslot
        @slot('table')
            @foreach($activities as $activity)
                <tr>
                    <td>
                        <a href="{{route('admin.activity.edit', $activity)}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{route('admin.activity.edit', $activity)}}">
                            <i class="fas fa-trash"></i>
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