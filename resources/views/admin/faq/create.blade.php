@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.faq.create') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    make a new frequently asked questions (FAQ) item
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.faq.store', 'method' => 'POST']) !!}
                        <h5 for="exampleFormControlInput1">Translations</h5>

                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @foreach($languages as $language)
                                <a class="nav-item nav-link {{$loop->first ? 'active' : ''}}" data-toggle="tab" href="#nav-{{$language->country_code_large}}" role="tab">
                                    {{$language->country_code_flag}}
                                </a>
                            @endforeach
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <br>
                            @foreach($languages as $language)

                                <div class="tab-pane fade {{$loop->first ? 'show active' : ''}}" id="nav-{{$language->country_code_large}}" role="tabpanel">
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" class="form-control" name="translation[{{$language->id}}][title]" placeholder="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea class="summernote" name="translation[{{$language->id}}][description]"></textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="">
                            <button class="btn btn-success" type="submit">Save</button>
                            <a href="" class="btn btn-default">Cancel</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    @component('components.rich-textarea-editor')

    @endcomponent

@endsection

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush