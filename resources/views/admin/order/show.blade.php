@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.order.edit', $order) !!}
@endsection

@section('content')


    <div class="row">

        <div class="col">

            <h2>Order #{{$order->id}}</h2>

            <hr>

            <div class="row">
                {{--TODO use these values to make a form--}}
                <div class="col-sm-6 col-md-6 col-lg-6" id="orderDetails">
                    <div class="card">
                        <div class="card-body">
                            <h4>Business</h4>
                            <p><b>company name:</b>{!! $order->company_name !!}</p>
                            <p><b>company vat:</b>{!! $order->company_vat !!}</p>
                            <p><b>company coc:</b>{!! $order->company_coc !!}</p>
                            <br>
                            <h4>address</h4>
                            <p><b>country:</b>{!! $order->country !!}</p>
                            <p><b>state:</b>{!! $order->state !!}</p>
                            <p><b>city:</b>{!! $order->city !!}</p>
                            <p><b>postal code:</b>{!! $order->postal_code !!}</p>
                            <p><b>address:</b>{!! $order->address !!}</p>
                            <p><b>address number:</b>{!! $order->address_number !!}</p>
                            <div id="this" class="d-none">
                                {!! ucfirst($order->company_name) !!}<br>
                                {!! ucwords($order->name) !!}<br>
                                {!! ucfirst($order->address) !!} {!! $order->address_number !!},<br>
                                {!! strtoupper($order->postal_code) !!} {!! ucfirst($order->city) !!}<br>
                                {!! ucfirst($order->country) !!}
                                <br>
                                <br>
                                {{--{!! $order->ean13() !!}--}}
                            </div>
                            <a href="" onclick="PrintElem('#this', 'print label')" class="btn btn-block btn-warning">print packages label</a>
                            <br>
                            <h4>contact</h4>
                            <p><b>name:</b>{!! $order->name !!}</p>
                            <p><b>email:</b>{!! $order->email !!}</p>
                            <p><b>telephone:</b>{!! $order->telephone !!}</p>
                            <br>
                            <h4>order details</h4>
                            <p><b>currency:</b>{!! $order->currency !!}</p>
                            <p><b>total paid:</b>{!! $order->total_paid !!}</p>
                            {{--<p><b>shipping cost:</b>{!! $order->shipping_cost !!}</p>--}}
                            <p><b>payment id:</b>{!! $order->payment_id !!}</p>
                            <p><b>payment method:</b>{!! $order->payment_method !!}</p>
                            <p><b>status:</b>{!! $order->status !!}</p>
                            <p><b>created at:</b>{!! $order->created_at !!}</p>
                            <p><b>updated at:</b>{!! $order->updated_at !!}</p>

                    {{--@endcomponent--}}
                        </div>
                    </div>
                </div>

                {{--<div class="col-sm-6 col-md-6 col-lg-8">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12 col-lg-6">--}}
                            {{--<div class="card">--}}
                                {{--<div class="card-body">--}}
{{--                            @component('components.panel', ['title' => 'ordered products'])--}}
                                    {{--<a class="btn btn-block btn-warning" onclick="PrintElem('#packingSlip', 'print label')">packing slip</a>--}}

    {{--                                @foreach($order->productOrders as $item)--}}
                                        {{--<hr>--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-md-4">--}}
                                                {{--@if(!empty($item->product->images->first()))--}}
                                                    {{--<img src="{!! $item->product->images->first()->path !!}" alt="" class="img-fluid">--}}
                                                {{--@endif--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-8">--}}
                                                {{--{!! $item->product->titleTranslated() !!}<br>--}}
                                                {{--<b>product nr:</b> {!! $item->product->id !!}<br>--}}
                                                {{--<b>price:</b> {!! $item->price !!}<br>--}}
                                                {{--<b>unit(s):</b> {!! $item->amount !!}x<br>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                    {{--@endforeach--}}
                                    {{--<div id="packingSlip" class="d-none">--}}
                                        {{--order  #{!! $order->id !!}--}}
                                        {{--<br>--}}
                                        {{--{!! $order->ean13()!!}--}}
                                        {{--<br>--}}
                                        {{--{!! ucfirst($order->company_name) !!}<br>--}}
                                        {{--{!! ucwords($order->name) !!}<br>--}}
                                        {{--{!! ucfirst($order->address) !!} {!! $order->address_number !!},<br>--}}
                                        {{--{!! strtoupper($order->postal_code) !!} {!! ucfirst($order->city) !!}<br>--}}
                                        {{--{!! ucfirst($order->country) !!}--}}
                                        {{--<br>--}}
                                        {{--<br>--}}
                                        {{--<table class="table table-bordered" cellpadding="10" border="1" style="border-collapse: collapse;">--}}
                                            {{--<thead>--}}
                                            {{--<tr>--}}
                                                {{--<th scope="col">title</th>--}}
                                                {{--<th scope="col">unit price</th>--}}
                                                {{--<th scope="col">quantity</th>--}}
                                                {{--<th scope="col">total</th>--}}
                                                {{--<th scope="col">ean</th>--}}
                                            {{--</tr>--}}
                                            {{--</thead>--}}
                                            {{--<tbody>--}}
                                            {{--@foreach($order->productOrders as $item)--}}
                                                {{--<tr>--}}
                                                    {{--<td scope="row">--}}
                                                        {{--{!! $item->product->titleTranslated() !!}--}}
                                                        {{--{!! $item->product->id !!}--}}
                                                    {{--</td>--}}
                                                    {{--<td scope="row">{!! $item->price !!}</td>--}}
                                                    {{--<td scope="row">{!! $item->amount !!}</td>--}}
                                                    {{--<td scope="row">{!! $item->price * $item->amount !!}</td>--}}
                                                    {{--<td scope="row">--}}
                                                        {{--@foreach($item->product->barcodes as $barcode)--}}
                                                            {{--{!! $barcode->ean13() !!}--}}
                                                            {{--<b class="text-center" style="background-color: #FFFFFF;">--}}
                                                                {{--{!! $barcode->value !!}--}}
                                                            {{--</b>--}}
                                                        {{--@endforeach--}}
                                                    {{--</td>--}}
                                                {{--</tr>--}}
                                            {{--@endforeach--}}

                                            {{--</tbody>--}}
                                        {{--</table>--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--@endcomponent--}}
                        {{--</div>--}}
                        <div class="col-md-12 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                            {{--@component('components.panel', ['title' => 'invoice'])--}}
                                <a href="{!! route('admin.pdf.downloadInvoice', $order->id) !!}" class="btn btn-block btn-warning">download</a>
                                {{--<a href="" class="btn btn-block btn-warning">print</a>--}}
                                <a href="{!! route('admin.pdf.streamInvoice', $order->id) !!}" target="_black" class="btn btn-block btn-warning">view</a>
                            {{--@endcomponent--}}

{{--                            @component('components.panel', ['title' => 'Order status'])--}}
                                {{--dropdown en dan status veranderen (alle opties van status van bestelling)--}}
                                {{--@foreach($order->productOrders as $item)--}}
                                {{--{!! $item->product !!}--}}
                                {{--@endforeach--}}
                                {{--{!! Form::model($order, ['route' => ['admin.order.update', $order->id], 'method' => 'PATCH']) !!}--}}
                                {{--<div class="form-group {!! !$errors->has('status') ? : 'has-error'!!}">--}}
                                    {{--<label for="">* Order status</label>--}}
                                    {{--@if($order->status == 'send')--}}
                                        {{--{!! Form::text('status', null, ['class' => 'form-control', 'disabled']) !!}--}}
                                    {{--@else--}}
                                        {{--<select class="custom-select form-control" name="status">--}}
                                            {{--<option selected>-- selected status --</option>--}}
                                            {{--<option value="in_treatment" {!! $order->status == 'paid'? : 'disabled' !!}>in treatment</option>--}}
                                            {{--<option value="send_package" {!! $order->status == 'treatment'? : 'disabled' !!}>send package</option>--}}
                                            {{--<option value="2">cancelled</option>--}}
                                        {{--</select>--}}
                                    {{--@endif--}}
                                    {{--@include('components.error', ['field' => 'status'])--}}
                                {{--</div>--}}

                                {{--<div class="form-group {!! !$errors->has('package_tracking_code') ? : 'has-error'!!}">--}}
                                    {{--@if($order->status == 'treatment')--}}
                                        {{--<label for="">* Package tracking code</label>--}}
                                        {{--{!! Form::text('package_tracking_code', null, ['class' => 'form-control']) !!}--}}
                                    {{--@else--}}
                                        {{--@if($order->status == 'send')--}}
                                            {{--<label for="">* Package tracking code</label>--}}
                                            {{--{!! Form::text('package_tracking_code', null, ['class' => 'form-control', 'disabled']) !!}--}}
                                        {{--@endif--}}
                                    {{--@endif--}}
                                    {{--@include('components.error', ['field' => 'package_tracking_code'])--}}

                                {{--</div>--}}

                                {{--@component('components.model', [--}}
                                        {{--'id' => 'orderTableBtn'.$order->id,--}}
                                        {{--'title' => 'Edit',--}}
                                        {{--'tooltip' => 'update order status',--}}
                                        {{--'actionRoute' => route('admin.order.update', $order->id),--}}
                                        {{--'btnClass' => 'btn btn-block btn-danger',--}}
                                        {{--'btnIcon' => null,--}}
                                        {{--'btnTitle' => 'Edit',--}}
                                    {{--])--}}
                                    {{--@slot('description')--}}
                                        {{--Are you sure to proceed?--}}
                                    {{--@endslot--}}
                                {{--@endcomponent--}}
                                {{--{!! Form::close() !!}--}}

                            {{--@endcomponent--}}
                            {{--@component('components.panel', ['title' => 'packing slip'])--}}
                            {{--<a href="" class="btn btn-block btn-warning">print</a>--}}
                            {{--@foreach($order->productOrders as $item)--}}
                            {{--{!! $item->product->titleTranslated()!!}<br>--}}
                            {{--<b>product nr: </b>{!! $item->product->id !!}--}}
                            {{--@foreach($item->product->barcodes as $barcode)--}}
                            {{----}}
                            {{--@endforeach--}}
                            {{--@endforeach--}}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--@endcomponent--}}

                </div>

            </div>
        </div>

    </div>

    {{--<div class="row">--}}
        {{--<div class="col-12 col-md-9 col-lg-9">--}}
            {{--<div class="card">--}}
                {{--<div class="card-body">--}}
                    {{--{!! Form::model($user, ['route' => ['admin.faq.update', $user->id], 'method' => 'PATCH']) !!}--}}
                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('name', 'Naam') !!}--}}
                            {{--{!! Form::text('name', null, ['class' => 'form-control'.(!$errors->has('name') ? '': ' is-invalid '), 'disabled']) !!}--}}
                            {{--@include('components.error', ['field' => 'name'])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('email', 'email') !!}--}}
                            {{--{!! Form::text('email', null, ['class' => 'form-control'.(!$errors->has('email') ? '': ' is-invalid '), 'disabled']) !!}--}}
                            {{--@include('components.error', ['field' => 'email'])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('first_name', 'first_name') !!}--}}
                            {{--{!! Form::text('first_name', null, ['class' => 'form-control'.(!$errors->has('first_name') ? '': ' is-invalid ')]) !!}--}}
                            {{--@include('components.error', ['field' => 'first_name'])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('last_name', 'last_name') !!}--}}
                            {{--{!! Form::text('last_name', null, ['class' => 'form-control'.(!$errors->has('last_name') ? '': ' is-invalid ')]) !!}--}}
                            {{--@include('components.error', ['field' => 'last_name'])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('gender', 'gender') !!}--}}
                            {{--{!! Form::text('gender', null, ['class' => 'form-control'.(!$errors->has('gender') ? '': ' is-invalid ')]) !!}--}}
                            {{--@include('components.error', ['field' => 'gender'])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('country', 'country') !!}--}}
                            {{--{!! Form::text('country', null, ['class' => 'form-control'.(!$errors->has('country') ? '': ' is-invalid ')]) !!}--}}
                            {{--@include('components.error', ['field' => 'country'])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('city', 'city') !!}--}}
                            {{--{!! Form::text('city', null, ['class' => 'form-control'.(!$errors->has('city') ? '': ' is-invalid ')]) !!}--}}
                            {{--@include('components.error', ['field' => 'city'])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('zipcode', 'zipcode') !!}--}}
                            {{--{!! Form::text('zipcode', null, ['class' => 'form-control'.(!$errors->has('zipcode') ? '': ' is-invalid ')]) !!}--}}
                            {{--@include('components.error', ['field' => 'zipcode'])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('street_name', 'street_name') !!}--}}
                            {{--{!! Form::text('street_name', null, ['class' => 'form-control'.(!$errors->has('street_name') ? '': ' is-invalid ')]) !!}--}}
                            {{--@include('components.error', ['field' => 'street_name'])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('street_nr', 'street_nr') !!}--}}
                            {{--{!! Form::text('street_nr', null, ['class' => 'form-control'.(!$errors->has('street_nr') ? '': ' is-invalid ')]) !!}--}}
                            {{--@include('components.error', ['field' => 'street_nr'])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('status', 'status') !!}--}}
                            {{--{!! Form::text('status', null, ['class' => 'form-control'.(!$errors->has('status') ? '': ' is-invalid ')]) !!}--}}
                            {{--@include('components.error', ['field' => 'status'])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('created_at', 'created_at') !!}--}}
                            {{--{!! Form::text('created_at', null, ['class' => 'form-control'.(!$errors->has('created_at') ? '': ' is-invalid '), 'disabled']) !!}--}}
                            {{--@include('components.error', ['field' => 'created_at'])--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('updated_at', 'updated_at') !!}--}}
                            {{--{!! Form::text('updated_at', null, ['class' => 'form-control'.(!$errors->has('updated_at') ? '': ' is-invalid '), 'disabled']) !!}--}}
                            {{--@include('components.error', ['field' => 'updated_at'])--}}
                        {{--</div>--}}

                        {{--<button class="btn btn-warning" type="submit">Save</button>--}}

                    {{--{!! Form::close() !!}--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--@component('components.rich-textarea-editor')--}}
    {{--@endcomponent--}}

@endsection

{{--@push('css')--}}
    {{--<style>--}}

    {{--</style>--}}
{{--@endpush--}}

{{--@push('js')--}}
    {{--<script>--}}

    {{--</script>--}}
{{--@endpush--}}