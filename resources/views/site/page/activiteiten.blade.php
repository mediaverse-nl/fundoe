@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                {!! Editor('seo_activiteiten_pagina', 'richtext', false, '<h1>Activiteiten</h1>') !!}
            </div>
        </div>
    </div>
@endsection
