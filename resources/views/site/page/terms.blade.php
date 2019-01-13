@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                {!! Editor('terms', 'richtext', false, '<h1>Algemene voorwaarden</h1>') !!}
            </div>
        </div>
    </div>
@endsection
