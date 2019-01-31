<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- seo -->
    {!! SEO::generate() !!}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />

    <style>
        .shadow{
            /*box-shadow: 0 0.3rem 1.2rem rgba(0, 0, 0, 0.15) !important;*/
        }
        .card{
            border-radius: 0px !important;
        }
        .card-header:first-child {
            border-radius: 0px !important;
        }
        .truncated-title{

        }
        .truncated{
            display: -webkit-box;
            height: 4.8rem;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis !important;
            -webkit-line-clamp: 3;
             line-height: 1.6rem;
        }
    </style>

    @if(Auth::check() && Auth::user()->admin == 1)
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
        <style>
            .note-air-popover{
                background-color: #e83e8c;
                width: 380px;
                max-width: 380px;
                min-width: 200px;
                border-radius: 0px !important;
            }
            .popover-content.note-children-container{
                background-color: #cecece;
                color: #eeeeee;
            }
        </style>
    @endif

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    @stack('css')

</head>
<body class="d-flex flex-column">

    <div class="flex-fill">
        @include('components.menu-top-fixed')

        @yield('content')
    </div>

    @include('components.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>

    @if(Auth::check() && Auth::user()->admin == 1)
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
    @endif

    @stack('js')

</body>
</html>
