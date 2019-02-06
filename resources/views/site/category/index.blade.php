@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('site.category.index') !!}
@endsection

@section('content')

    <div class="container product-cards">
        <div class="row">

            @foreach($categories as $category)
                <div class="col-md-4">
                    <div class="card shadow-sm bg-white" style="border-radius: 0px;">
                        <a href="{!! route('site.category.show', $category->id) !!}">
                            <div class="filter-content">
                                <div class="card-body" style="margin-top: -10px; padding: 35px 0px;">
                                    <h1 class="text-center display-4" >{!! $category->value !!}</h1>
                                </div> <!-- card-body.// -->
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection

@push('css')
    <link href="{{ asset('/css/site/category.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.0/css/bootstrap-slider.min.css" rel="stylesheet">
    <style>

    </style>
@endpush

@push('js')
    <script type="text/javascript" src="http://cdn.rawgit.com/hilios/jQuery.countdown/2.1.0/dist/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.0/bootstrap-slider.min.js"></script>
@endpush