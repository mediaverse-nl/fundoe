@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.activity.create') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.activity.store'], 'method' => 'POST']) !!}

                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', null, ['class' => 'form-control'.(!$errors->has('title') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'title'])
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control'.(!$errors->has('description') ? '': ' is-invalid '), 'rows' => 3]) !!}
                        @include('components.error', ['field' => 'description'])
                    </div>

                    <div class="form-group">
                        <label for="">Images</label>
                        <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="productThumbnail" data-preview="imgHolder" class="btn btn-primary text-white" style="border-radius: 0px !important;">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                            <input id="productThumbnail" class="form-control" type="text" value="" disabled>
                            <input type="hidden" id="productThumbnailCopy" class="form-control" name="images" value="">
                        </div>
                        <div id="imgHolder" style="margin:15px 0px;max-height:100px;"></div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('price', 'Price') !!}
                        {!! Form::number('price', null, ['class' => 'form-control'.(!$errors->has('price') ? '': ' is-invalid ')]) !!}
                        <small class="muted">*use . to separate</small>
                        @include('components.error', ['field' => 'price'])
                    </div>

                    <div class="form-group">
                        {!! Form::label('region', 'Region') !!}
                        {!! Form::text('region', null, ['class' => 'form-control'.(!$errors->has('region') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'region'])
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

        function getImagePath(el) {
            $('#productThumbnailCopy').val(el);
        }

        getImagePath($('#productThumbnail').val());

        $('#productThumbnail').change(function() {
            getImagePath($(this).val());
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker2').datetimepicker({
                locale: 'nl',
                format: 'YYYY-MM-D HH:mm'
            });
        });
    </script>
@endpush