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
                <h2 class="my-4">Best lopende events</h2>

                <div class="multiple-items" style=" ">
                    @foreach($bestSoldEvent as $i)
                        @component('components.event-card', ['event' => $i, 'width' => true])

                        @endcomponent
                    @endforeach
                </div>

                <h2 class="my-4">Populaire events</h2>

                <div class="multiple-items" style=" ">
                    @foreach($bestSoldEvent as $i)
                        @component('components.event-card', ['event' => $i, 'width' => true])

                        @endcomponent
                    @endforeach
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
            color: #212529;
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

        /*.slide-container {*/
            /*!*overflow: hidden;*!*/
        /*}*/

        /*.multiple-items:nth-child(n+1) {*/
            /*display: none;*/
        /*}*/

        /*.slick-initialized,*/
        /*.multiple-items:first-child {*/
            /*display: block;*/
        /*}*/

    </style>
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.1.0/js/jquery.plugin.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.1.0/dist/jquery.countdown.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
        $("#countdown")
            .countdown("2017/01/01", function(event) {
                $(this).text(
                    event.strftime('%D days %H:%M:%S')
                );
            });

        $('.multiple-items').slick({
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 2,
            arrows: true,
            variableWidth: false,

            // nextArrow: '<button class="slick-next slick-arrow" style="" aria-disabled="false"><i class="fas fa-chevron-right"></i></button>',
            // prevArrow: '<button class="slick-prev slick-arrow"><i class="fas fa-chevron-left"></i></button>',
        });
    </script>
@endpush
