@extends('layouts.app')

@section('content')

    <br>

    <div class="container">
        <div class="row">
            <div class="col-6">

                {!! Editor('order_status_message', 'richtext', false, 'Here you can use rows and columns here to organize your footer content.', ['mentions' => $order]) !!}

            </div>
        </div>
    </div>

    <br>

@endsection

@push('css')

@endpush

@push('js')

@endpush
