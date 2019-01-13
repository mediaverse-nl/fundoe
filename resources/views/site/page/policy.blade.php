@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                {!! Editor('policy', 'richtext', false, '<h1>privacy policy</h1>') !!}
            </div>
        </div>
    </div>
@endsection
