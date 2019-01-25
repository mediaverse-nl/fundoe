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
                            {!! Form::label('start_datetime', 'Start datetime') !!}
                            <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker" style="-moz-border-radius-bottomleft: .25rem;">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                {!! Form::text('start_datetime', null, ['class' => 'datetimepicker-input form-control'.(!$errors->has('start_datetime') ? '': ' is-invalid '), 'data-toggle' => 'datetimepicker', 'data-target' => '#datetimepicker2']) !!}
                            </div>
                            @include('components.error', ['field' => 'start_datetime'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('end_datetime', 'Start datetime') !!}
                            <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker" style="-moz-border-radius-bottomleft: .25rem;">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                {!! Form::text('end_datetime', null, ['class' => 'datetimepicker-input form-control'.(!$errors->has('end_datetime') ? '': ' is-invalid '), 'data-toggle' => 'datetimepicker', 'data-target' => '#datetimepicker2']) !!}
                            </div>
                            @include('components.error', ['field' => 'end_datetime'])
                        </div>

                        <button class="btn btn-warning" type="submit">Save</button>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

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
    <script>
        var route_prefix = "{!! url(config('lfm.url_prefix')) !!}";

        $('#lfm').filemanager('file', {prefix: route_prefix});

        $('#productThumbnailCopy').change(function() {
            $('#thumbnailCopy').val($(this).val());
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker2').datetimepicker({
                locale: 'nl',
                format: 'YYYY-MM-D HH:mm:ss'
            });
        });
    </script>
@endpush