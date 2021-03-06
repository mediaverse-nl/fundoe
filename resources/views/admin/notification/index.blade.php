@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.category.index') !!}
@endsection

@section('content')

    <!-- DataTables Example -->
    @component('components.datatable', ['title' => 'activity'])
        @slot('head')
            <th>Pagina</th>
            <th>Position</th>
        @endslot
        @slot('table')
            <tr>
                <td>
                    <a href="{{route('admin.activity.edit', $product->id)}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{route('admin.activity.edit', $product->id)}}">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endslot
    @endcomponent

@endsection

@push('css')
    <style></style>
@endpush

@push('scripts')
    <script></script>
@endpush