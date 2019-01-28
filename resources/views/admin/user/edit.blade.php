@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.user.edit', $user) !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-9 col-lg-9">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($user, ['route' => ['admin.faq.update', $user->id], 'method' => 'PATCH']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Naam') !!}
                            {!! Form::text('name', null, ['class' => 'form-control'.(!$errors->has('name') ? '': ' is-invalid '), 'disabled']) !!}
                            @include('components.error', ['field' => 'name'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'email') !!}
                            {!! Form::text('email', null, ['class' => 'form-control'.(!$errors->has('email') ? '': ' is-invalid '), 'disabled']) !!}
                            @include('components.error', ['field' => 'email'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('first_name', 'first_name') !!}
                            {!! Form::text('first_name', null, ['class' => 'form-control'.(!$errors->has('first_name') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'first_name'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('last_name', 'last_name') !!}
                            {!! Form::text('last_name', null, ['class' => 'form-control'.(!$errors->has('last_name') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'last_name'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('gender', 'gender') !!}
                            {!! Form::text('gender', null, ['class' => 'form-control'.(!$errors->has('gender') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'gender'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('country', 'country') !!}
                            {!! Form::text('country', null, ['class' => 'form-control'.(!$errors->has('country') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'country'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('city', 'city') !!}
                            {!! Form::text('city', null, ['class' => 'form-control'.(!$errors->has('city') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'city'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('zipcode', 'zipcode') !!}
                            {!! Form::text('zipcode', null, ['class' => 'form-control'.(!$errors->has('zipcode') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'zipcode'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('street_name', 'street_name') !!}
                            {!! Form::text('street_name', null, ['class' => 'form-control'.(!$errors->has('street_name') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'street_name'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('street_nr', 'street_nr') !!}
                            {!! Form::text('street_nr', null, ['class' => 'form-control'.(!$errors->has('street_nr') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'street_nr'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'status') !!}
                            {!! Form::text('status', null, ['class' => 'form-control'.(!$errors->has('status') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'status'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('created_at', 'created_at') !!}
                            {!! Form::text('created_at', null, ['class' => 'form-control'.(!$errors->has('created_at') ? '': ' is-invalid '), 'disabled']) !!}
                            @include('components.error', ['field' => 'created_at'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('updated_at', 'updated_at') !!}
                            {!! Form::text('updated_at', null, ['class' => 'form-control'.(!$errors->has('updated_at') ? '': ' is-invalid '), 'disabled']) !!}
                            @include('components.error', ['field' => 'updated_at'])
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

{{--@push('css')--}}
    {{--<style>--}}

    {{--</style>--}}
{{--@endpush--}}

{{--@push('js')--}}
    {{--<script>--}}

    {{--</script>--}}
{{--@endpush--}}