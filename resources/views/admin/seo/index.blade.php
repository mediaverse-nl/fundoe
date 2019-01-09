@extends('layouts.admin')

@section('content')

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            SEO Table
        </div>
        <div class="card-body">
            <div class="table-responsive">
                {{--<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th>Name</th>--}}
                        {{--<th>Position</th>--}}
                        {{--<th>Office</th>--}}
                        {{--<th>Age</th>--}}
                        {{--<th>Start date</th>--}}
                        {{--<th>Opties</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tfoot>--}}
                    {{--<tr>--}}
                        {{--<th>Name</th>--}}
                        {{--<th>Position</th>--}}
                        {{--<th>Office</th>--}}
                        {{--<th>Age</th>--}}
                        {{--<th>Start date</th>--}}
                        {{--<th>Opties</th>--}}
                    {{--</tr>--}}
                    {{--</tfoot>--}}
                    {{--<tbody>--}}
                    {{--@foreach($products as $product)--}}
                        {{--<tr>--}}
                            {{--<td>Tiger Nixon</td>--}}
                            {{--<td>System Architect</td>--}}
                            {{--<td>Edinburgh</td>--}}
                            {{--<td>61</td>--}}
                            {{--<td>2011/04/25</td>--}}
                            {{--<td>--}}
                                {{--<a href="{{route('admin.product.edit', $product->id)}}">--}}
                                    {{--<i class="fas fa-edit"></i>--}}
                                {{--</a>--}}
                                {{--<a href="{{route('admin.product.edit', $product->id)}}">--}}
                                    {{--<i class="fas fa-trash"></i>--}}
                                {{--</a>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            </div>
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