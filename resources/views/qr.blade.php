@extends('layouts.app')

@section('content')

    <div class="visible-print text-center">
        {!! QrCode::size(400)->generate(Request::url()); !!}
        <p>Scan me to return to the original page.</p>
    </div>

    <div class="container-fluid header_se">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
{{--            @if(!Sentinel::getUser())--}}
                <div class="row">
                    <div id="reader" class="center-block" style="width:300px;height:250px">
                    </div>
                </div>
                <div class="row">
                    <div id="message" class="text-center">
                    </div>
                </div>
            {{--@else--}}
                {{--<h1>Hallo! {{Sentinel::getUser()->first_name}}</h1>--}}
            {{--@endif--}}
        </div>
        <div class="col-md-2">
        </div>

    </div>
    <video id="preview"></video>


    {{--    <img src="{!!$message->embedData(QrCode::format('png')->generate('Embed me into an e-mail!'), 'QrCode.png', 'image/png')!!}">--}}
    <div class="select">
        <label for="videoSource">Select Camera: </label><select id="videoSource"></select>
    </div>


@endsection

@push('css')

@endpush

@push('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    {{--<script type="text/javascript" src="{{ URL::asset('/js/auth/instascan.min1.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ URL::asset('/js/auth/html5-qrcode.min.js') }}"></script>--}}
     {{--<script type="text/javascript">--}}
        {{--$('#reader').html5_qrcode(function(data){--}}
                {{--$('#message').html('<span class="text-success send-true">Scanning now....</span>');--}}
                {{--if (data!='') {--}}
                    {{--$.ajax({--}}
                        {{--type: "POST",--}}
                        {{--cache: false,--}}
                        {{--url : "",--}}
                        {{--data: {"_token": "{{ csrf_token() }}",data:data},--}}
                        {{--success: function(data) {--}}
                            {{--console.log(data);--}}
                            {{--if (data==1) {--}}
                                {{--//location.reload()--}}
                                {{--$(location).attr('href', '{{url('/')}}');--}}
                            {{--}else{--}}
                                {{--return confirm('There is no user with this qr code');--}}
                            {{--}--}}
                            {{--//--}}
                        {{--}--}}
                    {{--})--}}
                {{--}else{return confirm('There is no  data');}--}}
            {{--},--}}
            {{--function(error){--}}
                {{--$('#message').html('Scaning now ....'  );--}}
            {{--}, function(videoError){--}}
                {{--$('#message').html('<span class="text-danger camera_problem"> there was a problem with your camera </span>');--}}
            {{--}--}}
        {{--);--}}
    {{--</script>--}}
    <script type="text/javascript">
        let shouldFaceUser = true; //Default is the front cam

        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview'),
            facingMode: 'user'

        });
        scanner.addListener('scan', function (content) {
            console.log(content);
            console.log('ajax post');
            console.log('ajax post ' + content + ' data');
        });
        Instascan.Camera.getCameras().then(function (cameras) {

            // scanner.start(cameras);
            if (cameras.length > 0) {
                start();
                console.log('----------');
                console.log(cameras[0]);
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });


        var videoSelect = document.querySelector("select#videoSource");
        var selectors = [videoSelect];

        function gotDevices(deviceInfos) {
            // Handles being called several times to update labels. Preserve values.
            var values = selectors.map(function(select) {
                return select.value;
            });
            selectors.forEach(function(select) {
                while (select.firstChild) {
                    select.removeChild(select.firstChild);
                }
            });

            for (var i = 0; i !== deviceInfos.length; ++i) {
                var deviceInfo = deviceInfos[i];
                var option = document.createElement("option");
                option.value = deviceInfo.deviceId;

                if (deviceInfo.kind === "videoinput") {
                    option.text = deviceInfo.label || "camera " + (videoSelect.length + 1);
                    videoSelect.appendChild(option);
                } else {
                    console.log("Some other kind of source/device: ", deviceInfo);
                }

                selectors.forEach(function(select, selectorIndex) {
                    if (
                        Array.prototype.slice.call(select.childNodes).some(function(n) {
                            return n.value === values[selectorIndex];
                        })
                    ) {
                        select.value = values[selectorIndex];
                    }
                });
            }
        }

        navigator.mediaDevices
            .enumerateDevices()
            .then(gotDevices)
            .catch(handleError);

        function gotStream(stream) {
            arToolkitSource.domElement.srcObject = stream; // make stream available to console
            // video.srcObject = stream;
            // Refresh button list in case labels have become available
            return navigator.mediaDevices.enumerateDevices();
        }

        function start() {
            if (window.stream) {
                window.stream.getTracks().forEach(function(track) {
                    track.stop();
                });
            }
            var videoSource = videoSelect.value;
            var constraints = {
                video: {
                    deviceId: videoSource ? { exact: videoSource } : undefined
                }
            };
            navigator.mediaDevices
                .getUserMedia(constraints)
                .then(gotStream)
                .then(gotDevices)
                .catch(handleError);
        }

        videoSelect.onchange = start;

        function handleError(error) {
            console.log("navigator.getUserMedia error: ", error);
        }



    </script>

@endpush
