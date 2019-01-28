@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.activity.edit', $event) !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($event, ['route' => ['admin.event.update', $event->id], 'method' => 'PATCH']) !!}

                        <div class="form-group">
                            {!! Form::label('price', 'Price') !!}
                            {!! Form::number('price', null, ['class' => 'form-control'.(!$errors->has('price') ? '': ' is-invalid ')]) !!}
                            <small class="muted">*use . to separate</small>
                            @include('components.error', ['field' => 'price'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('activity', 'Activity') !!}
                            {!! Form::select('activity', $activities->pluck('title', 'id'), null, ['class' => 'form-control'.(!$errors->has('activity') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'activity'])
                        </div>
                        <div class="form-group">
                            {!! Form::label('target_group', 'Target group') !!}
                            {!! Form::select('target_group', array_merge([null => '--- select ---'], \App\Event::getTargetGroup()), null, ['class' => 'form-control'.(!$errors->has('target_group') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'target_group'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('start_datetime', 'Start datetime') !!}
                            <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker" style="-moz-border-radius-bottomleft: .25rem;">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                {!! Form::text('start_datetime', null, ['class' => 'datetimepicker-input form-control'.(!$errors->has('start_datetime') ? '': ' is-invalid '), 'data-toggle' => 'datetimepicker', 'data-target' => '#datetimepicker']) !!}
                            </div>
                            @include('components.error', ['field' => 'start_datetime'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('end_datetime', 'End datetime') !!}
                            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker1" style="-moz-border-radius-bottomleft: .25rem;">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                {!! Form::text('end_datetime', null, ['class' => 'datetimepicker-input form-control'.(!$errors->has('end_datetime') ? '': ' is-invalid '), 'data-toggle' => 'datetimepicker', 'data-target' => '#datetimepicker1']) !!}
                            </div>
                            @include('components.error', ['field' => 'end_datetime'])
                        </div>

                        <button class="btn btn-warning" type="submit">Save</button>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    {{--<div class="container">--}}
        {{--<div class='col-md-5'>--}}
            {{--<div class="form-group">--}}
                {{--<div class="input-group date" id="datetimepicker" data-target-input="nearest">--}}
                    {{--<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker7"/>--}}
                    {{--<div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">--}}
                        {{--<div class="input-group-text"><i class="fa fa-calendar"></i></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class='col-md-5'>--}}
            {{--<div class="form-group">--}}
                {{--<div class="input-group date" id="datetimepicker1" data-target-input="nearest">--}}
                    {{--<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker8"/>--}}
                    {{--<div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">--}}
                        {{--<div class="input-group-text"><i class="fa fa-calendar"></i></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    @component('components.rich-textarea-editor')
    @endcomponent

@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <style>

    </style>
@endpush

@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script type="text/javascript">

        var route_prefix = "{!! url(config('lfm.url_prefix')) !!}";

        $('#lfm').filemanager('file', {prefix: route_prefix});

        $('#productThumbnailCopy').change(function() {
            $('#thumbnailCopy').val($(this).val());
        });

        $(function () {
            var today = new Date();
            $('#datetimepicker').datetimepicker({
                minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate(), today.getHours(), today.getMinutes()),
                autoclose: true,
                todayBtn: true,
                format: 'YYYY/MM/DD HH:mm'
            });
            $('#datetimepicker1').datetimepicker({
                useCurrent: false,
                minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
                autoclose: true,
                format: 'YYYY/MM/DD HH:mm'
            });
            $("#datetimepicker").on("change.datetimepicker", function (e) {
                $('#datetimepicker1').datetimepicker('minDate', e.date);
            });
            $("#datetimepicker1").on("change.datetimepicker", function (e) {
                $('#datetimepicker').datetimepicker('maxDate', e.date);
            });
        });
    </script>
@endpush