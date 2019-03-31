@extends('layouts.app')

@section('content')

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class=""></li>
            <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item">
                <img class="first-slide" src="https://lorempixel.com/1080/1920" alt="First slide" style="width: 100%">
                <div class="container">
                    <div class="carousel-caption text-left">
                        {!! Editor('welcome_banner1', 'richtext', false, '<h1>Another example headline.</h1><p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>') !!}
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item active">
                <img class="second-slide" src="https://lorempixel.com/1080/1920" alt="Second slide" style="width: 100%">
                <div class="container">
                    <div class="carousel-caption text-left">
                        {!! Editor('welcome_banner2', 'richtext', false, '<h1>Another example headline.</h1><p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>') !!}
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="third-slide" src="https://lorempixel.com/1080/1920" alt="Third slide" style="width: 100%">
                <div class="container">
                    <div class="carousel-caption text-left">
                        {!! Editor('welcome_banner3', 'richtext', false, '<h1>Another example headline.</h1><p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>') !!}
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-3">

                <h2 class="my-4">Categorieen</h2>
                <div class="list-group shadow-sm bg-white">
                    @foreach($categories as $category)
                        <a href="{!! route('site.category.show', $category->id) !!}" class="list-group-item" style="border-radius: 0px !important;">{!! $category->value !!}</a>
                    @endforeach
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">
                <h2 class="my-4">Populaire events</h2>

                {{--<div class="row" style="margin-top: -10px;">--}}
                    {{--@foreach($bestRatedEvent as $event)--}}
                        {{--@component('components.event-card', ['event' => $event])--}}
                        {{--@endcomponent--}}
                    {{--@endforeach--}}
                {{--</div>--}}

                <h2 class="my-4">Beste reviews</h2>

                <div class="row">

                    {{--<div class="col-lg-4 col-md-6 mb-4">--}}
                        {{--<div class="card h-100">--}}
                            {{--<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>--}}
                            {{--<div class="card-body">--}}
                                {{--<h4 class="card-title">--}}
                                    {{--<a href="#">Item Four</a>--}}
                                {{--</h4>--}}
                                {{--<h5>$24.99</h5>--}}
                                {{--<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>--}}
                            {{--</div>--}}
                            {{--<div class="card-footer">--}}
                                {{--<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-lg-4 col-md-6 mb-4">--}}
                        {{--<div class="card h-100">--}}
                            {{--<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>--}}
                            {{--<div class="card-body">--}}
                                {{--<h4 class="card-title">--}}
                                    {{--<a href="#">Item Five</a>--}}
                                {{--</h4>--}}
                                {{--<h5>$24.99</h5>--}}
                                {{--<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>--}}
                            {{--</div>--}}
                            {{--<div class="card-footer">--}}
                                {{--<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-lg-4 col-md-6 mb-4">--}}
                        {{--<div class="card h-100">--}}
                            {{--<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>--}}
                            {{--<div class="card-body">--}}
                                {{--<h4 class="card-title">--}}
                                    {{--<a href="#">Item Six</a>--}}
                                {{--</h4>--}}
                                {{--<h5>$24.99</h5>--}}
                                {{--<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>--}}
                            {{--</div>--}}
                            {{--<div class="card-footer">--}}
                                {{--<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                </div>
                <!-- /.row -->

                <div class="multiple-items">
                    <div style="padding: 5px 10px 10px 0px;">
                        <div class="card">
                            <div class="card-body">
                                asdasd
                            </div>
                        </div>
                    </div>
                    <div style="padding: 5px 10px 10px 0px;">
                        <div class="card">
                            <div class="card-body">
                                asdasd
                            </div>
                        </div>
                    </div>
                    <div style="padding: 5px 10px 10px 0px;">
                        <div class="card">
                            <div class="card-body">
                                asdasd
                            </div>
                        </div>
                    </div>
                    <div style="padding: 5px 10px 10px 0px;">
                        <div class="card">
                            <div class="card-body">
                                asdasd
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
    <link href="{{ asset('/css/site/category.css') }}" rel="stylesheet">
    <style>
        .carousel-inner{
            max-height: 500px;
        }
        .carousel-inner .carousel-item{
            max-height: 500px;
        }
        .carousel-item img{
            height: 500px !important;
            object-position: center !important;
            object-fit: cover !important;
        }
        .splitter-bar::before {
            content: '|';
            display: inline-block;
            margin: 0 7px;
            font-size: 0.9em;
            color: #ccc;
        }
        .splitter-bar:first-child:before
        {
            content: '';
        }

        .slick-prev:before,
        .slick-next:before {
            font-family: FontAwesome;
            font-size: 15px;
            line-height: 1;
            color: red;
            opacity: 0.75;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .slick-prev:before {
            content: "\f053";
        }
        [dir="rtl"] .slick-prev:before { content: "\f054"; }

        [dir="rtl"] .slick-next { left: -10px; top: 70px; right: auto; }
        .slick-next:before { content: "\f054"; }
        [dir="rtl"] .slick-next:before { content: "\f053"; }

    </style>
@endpush

@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
        $('.multiple-items').slick({
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: true,
            // nextArrow: '<button class="slick-next slick-arrow" style="" aria-disabled="false"><i class="fas fa-chevron-right"></i></button>',
            // prevArrow: '<button class="slick-prev slick-arrow"><i class="fas fa-chevron-left"></i></button>',
        });
    </script>
@endpush
