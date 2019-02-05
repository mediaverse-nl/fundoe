@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.event.edit', $event) !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($event, ['route' => ['admin.event.update', $event->id], 'method' => 'PATCH']) !!}

                        <div class="form-group">
                            {!! Form::label('price', 'Price') !!}<b> (advies prijs {!! $event->diffInTime() / 60 * $event->activity->price_per_hour!!})</b>
                            {!! Form::number('price', null, ['class' => 'form-control'.(!$errors->has('price') ? '': ' is-invalid ')]) !!}
                            <small class="muted">*use . to separate</small>
                            @include('components.error', ['field' => 'price'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('activity', 'Activity') !!}
                            {!! Form::select('activity', $activities->pluck('activityName', 'id'), null, ['class' => 'form-control'.(!$errors->has('activity') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'activity'])
                        </div>
                        <div class="form-group">
                            {!! Form::label('target_group', 'Target group') !!}
                            {!! Form::select('target_group', \App\Event::getTargetGroup(), null, ['class' => 'form-control'.(!$errors->has('target_group') ? '': ' is-invalid ')]) !!}
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

{{--                    {!! dd($errors->get('*')) !!}--}}
                        <div class="form-group">
                            {!! Form::label('duration', 'duration (in min)') !!}
                            {!! Form::number('duration', $event->diffInTime(), ['class' => 'form-control'.(!$errors->has('duration') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'duration'])
                        </div>

                        <button class="btn btn-warning" type="submit">Save</button>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
@endpush

@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script type="text/javascript">
        $(function () {
            var today = new Date();
            $('#datetimepicker').datetimepicker({
                minDate: new Date(today.getFullYear(), today.getMonth(), (today.getDate() + 2), today.getHours(), today.getMinutes()),
                autoclose: true,
                todayBtn: true,
                format: 'YYYY-MM-DD HH:mm'
            });

        });
    </script>
@endpush