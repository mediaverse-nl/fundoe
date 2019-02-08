<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>


</head>
<body class="d-flex flex-column">

<div class="flex-fill">
    @include('components.menu-top-fixed')

    <div class="container">
        <img src="" alt="">

        <div id="target col-8">
            <img src="https://www.morgana-kasten.nl/wp-content/uploads/2019/02/MORGANA_VIDEO_THUMBNAIL-2.jpg" alt="" style="position: absolute;" id="overlayThumbnail">
            <iframe id="videoContainer" width="100%" src="https://www.youtube.com/embed/Hwv6l8oYFfE?version=3&autoplay=1&mute=1" frameborder="0"></iframe>
        </div>

        asasdasd
    </div>

</div>

@include('components.footer')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<script>
    $( "#target" ).click(function() {
        $( "#overlayThumbnail" ).remove();
//        youtubeFeedCallback();
        alert( "Handler for .click() called." );
    });
</script>


</body>
</html>
