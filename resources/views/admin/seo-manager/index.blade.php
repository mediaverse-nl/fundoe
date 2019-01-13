@extends('layouts.admin')

@section('content')

    <!-- DataTables Example -->
    @component('components.datatable', ['title' => 'SEO Table'])
        @slot('head')
            <th>Pagina</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Opties</th>
        @endslot
        @slot('table')
            <tr>
                {{--<td>Tiger Nixon</td>--}}
                {{--<td>System Architect</td>--}}
                {{--<td>Edinburgh</td>--}}
                {{--<td>61</td>--}}
                {{--<td>2011/04/25</td>--}}
                <td>
                    {{--<a href="{{route('admin.product.edit', $product->id)}}">--}}
                    {{--<i class="fas fa-edit"></i>--}}
                    {{--</a>--}}
                    {{--<a href="{{route('admin.product.edit', $product->id)}}">--}}
                    {{--<i class="fas fa-trash"></i>--}}
                    {{--</a>--}}
                </td>
            </tr>
        @endslot
    @endcomponent

@endsection

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush