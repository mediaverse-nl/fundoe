@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('activity', $faq) !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">

                    {{--{!! Form::model($faq, ['route' => ['admin.faq.update', $faq->id], 'method' => 'PATCH']) !!}--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('title', 'Title') !!}--}}
                            {{--{!! Form::text('title', null, ['class' => 'form-control'.(!$errors->has('title') ? '': ' is-invalid ')]) !!}--}}
                            {{--@include('components.error', ['field' => 'title'])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('description', 'Description') !!}--}}
                            {{--{!! Form::textarea('description', null, ['class' => 'summernote '.(!$errors->has('description') ? '': ' is-invalid ')]) !!}--}}
                            {{--@include('components.error', ['field' => 'description'])--}}
                        {{--</div>--}}
                        {{--<button class="btn btn-warning" type="submit">Save</button>--}}
                        {{--<a href="" class="btn btn-danger">Cancel</a>--}}

                    {{--{!! Form::close() !!}--}}

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