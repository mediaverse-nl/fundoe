@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.activity.edit', $activity) !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($activity, ['route' => ['admin.activity.update', $activity->id], 'method' => 'PATCH']) !!}

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
                            <input id="productThumbnail" class="form-control" type="text" disabled
                                   value="{!! $activity->img !!}">
                            <input type="hidden" id="productThumbnailCopy" class="form-control" name="images"
                                   value="{!! $activity->img !!}">
                        </div>
                        <div id="imgHolder" style="margin-top:15px;max-height:100px;">
                            @foreach($activity->images() as $image)
                                <img src="{!! $image !!}" style="height: 5rem;">
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('category', 'category') !!}
                        {!! Form::select('category', \App\Category::pluck('value', 'id'), null, ['class' => 'form-control'.(!$errors->has('category') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'category'])
                    </div>

                    <div class="form-group">
                        {!! Form::label('price_per_hour', 'price per hour') !!}
                        {!! Form::number('price_per_hour', null, ['class' => 'form-control'.(!$errors->has('price_per_hour') ? '': ' is-invalid '), 'step' => 'any']) !!}
                        <small class="muted">*use . to separate</small>
                        @include('components.error', ['field' => 'price_per_hour'])
                    </div>

                    <div class="form-group">
                        {!! Form::label('max_number_of_people', 'max number of people') !!}
                        {!! Form::number('max_number_of_people', null, ['class' => 'form-control'.(!$errors->has('max_number_of_people') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'max_number_of_people'])
                    </div>

                    <div class="form-group">
                        {!! Form::label('min_number_of_people', 'min number of people') !!}
                        {!! Form::number('min_number_of_people', null, ['class' => 'form-control'.(!$errors->has('min_number_of_people') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'min_number_of_people'])
                    </div>

                    <div class="form-group">
                        {!! Form::label('min_duration', 'min duration') !!}
                        {!! Form::number('min_duration', null, ['class' => 'form-control'.(!$errors->has('min_duration') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'min_duration'])
                    </div>

                    <div class="form-group">
                        {!! Form::label('region', 'Region') !!}
                        {!! Form::text('region', null, ['class' => 'form-control'.(!$errors->has('region') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'region'])
                    </div>

                    <div class="form-group">
                        {!! Form::label('location', 'location') !!}
                        {!! Form::text('location', null, ['class' => 'form-control'.(!$errors->has('location') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'location'])
                    </div>
                    @component('components.model', [
                        'id' => 'CreateCategory',
                        'title' => 'Edit entry ',
                        'actionRoute' => route('admin.activity.store'),
                        'btnClass' => 'btn btn-warning',
                        'btnIcon' => null,
                        'btnTitle' => 'edit',
                    ])
                        @slot('description')
                            If u proceed u will <b>edit</b> this entry
                        @endslot
                    @endcomponent
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
        <div class="col-md-4">
             @foreach($activity->event()->whereDate('start_datetime', '>=', $activity->ableToOrderDate())->get() as $event)
                <div class="card">
                    <div class="card-body">
                        <table class="table" style="padding: 0px !important;">
                            <tr>
                                <th style="padding: 0px !important;">start_datetime</th>
                                <td class="pull-right" style="padding: 0px !important;">{!! $event->start_datetime->format('d-m-Y - h:i') !!}</td>
                            </tr>
                            <tr>
                                <th style="padding: 0px !important;">target_group</th>
                                <td class="pull-right" style="padding: 0px !important;">{!! $event->target_group !!}</td>
                            </tr>
                            <tr>
                                <th style="padding: 0px !important;">duration</th>
                                <td class="pull-right" style="padding: 0px !important;">{!! $event->diffInTime() !!}</td>
                            </tr>
                        </table>
                        <a href="{!! route('admin.event.edit', $event->id) !!}" class="btn btn-sm btn-warning">edit</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

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
        $('#productThumbnail').change(function() {
            $('#productThumbnailCopy').val($(this).val());
        });

        var route_prefix = "{!! url(config('lfm.url_prefix')) !!}";

        $('#lfm').filemanager('file', {prefix: route_prefix});

    </script>
@endpush