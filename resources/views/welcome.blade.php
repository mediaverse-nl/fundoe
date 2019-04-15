@extends('layouts.app')

@section('content')

    <header class="masthead text-white text-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mb-5">Zoek naar leuke activiteiten bij jou in de buurt</h1>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form>
                        <div class="form-row">
                            <div class="col-12 col-md-12">
                                <div class="form-group has-feedback has-search">
                                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                    <input id="searchBar" type="search" name="q" class="form-control form-control-lg" placeholder="Zoek op; locatie, title of doelgroep" autocomplete="off">
                                 </div>
                             </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>

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
                <h2 class="my-4" style="padding: 0px 10px !important;">Best lopende events</h2>

                <div class="multiple-items" style=" ">
                    @foreach($bestSoldEvent as $i)
                        @component('components.event-card', ['event' => $i, 'width' => true])

                        @endcomponent
                    @endforeach
                </div>

                <h2 class="my-4" style="padding: 0px 10px !important;">Populaire events</h2>

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

        .has-search .form-control-feedback {
            right: initial;
            left: 0;
            color: #ccc;
        }

        .has-search .form-control {
            padding-right: 12px;
            padding-left: 34px;
        }

        body {
            font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-weight: 700;
        }

        header.masthead {
            position: relative;
            background-color: #343a40;
            background: url("/img/banner.jpg") no-repeat center center;
            background-size: cover;
            padding-top: 8rem;
            padding-bottom: 8rem;
        }

        header.masthead .overlay {
            position: absolute;
            background-color: #212529;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            opacity: 0.3;
        }

        header.masthead h1 {
            font-size: 2rem;
        }

        @media (min-width: 768px) {
            header.masthead {
                padding-top: 12rem;
                padding-bottom: 12rem;
            }
            header.masthead h1 {
                font-size: 3rem;
            }
        }

        .showcase .showcase-text {
            padding: 3rem;
        }

        .showcase .showcase-img {
            min-height: 30rem;
            background-size: cover;
        }

        @media (min-width: 768px) {
            .showcase .showcase-text {
                padding: 7rem;
            }
        }

        .twitter-typeahead{
            width: 100% !important;
        }
        .tt-menu a{
            padding: 15px;
            text-align: left !important;
        }
        .tt-menu{
            width: 100% !important;
            margin-top: 5px;
            border-radius: 7px !important;
            overflow: hidden;
        }

        .features-icons {
            padding-top: 7rem;
            padding-bottom: 7rem;
        }

        .features-icons .features-icons-item {
            max-width: 20rem;
        }

        .features-icons .features-icons-item .features-icons-icon {
            height: 7rem;
        }

        .features-icons .features-icons-item .features-icons-icon i {
            font-size: 4.5rem;
        }

        .features-icons .features-icons-item:hover .features-icons-icon i {
            font-size: 5rem;
        }

        .testimonials {
            padding-top: 7rem;
            padding-bottom: 7rem;
        }

        .testimonials .testimonial-item {
            max-width: 18rem;
        }

        .testimonials .testimonial-item img {
            max-width: 12rem;
            -webkit-box-shadow: 0px 5px 5px 0px #adb5bd;
            box-shadow: 0px 5px 5px 0px #adb5bd;
        }

        .call-to-action {
            position: relative;
            background-color: #343a40;
            /*background: url("../img/bg-masthead.jpg") no-repeat center center;*/
            background-size: cover;
            padding-top: 7rem;
            padding-bottom: 7rem;
        }

        .call-to-action .overlay {
            position: absolute;
            background-color: #212529;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            opacity: 0.3;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.1.0/js/jquery.plugin.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.1.0/dist/jquery.countdown.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>

        jQuery(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
            var engine = new Bloodhound({
                remote: {
                    url: '/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $("#searchBar").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                source: engine.ttAdapter(),
                displayKey: 'activity.title',
                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'usersList',
                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown">' +
                            '<div class="list-group-item">Nothing found.</div>' +
                        '</div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        return '<a href="' + $.trim(data.activity.title.replace(" ", "-")) + '/activiteit-' +data.id + '" class="list-group-item">'
                            + '<h2>' + data.activity.title + '</h2>'
                            + ' ' + data.start_datetime
                            + '</a>'
                    }
                }
            });
        });


        $("#countdown")
            .countdown("2017/01/01", function(event) {
                $(this).text(
                    event.strftime('%D days %H:%M:%S')
                );
            });

        $('[data-countdown]').each(function() {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime('%D dagen %H:%M:%S'));
            });
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
