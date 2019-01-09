@extends('layouts.app')

@section('content')

    <br>

    <div class="container">
        <div class="row">
            <div class="col-6">

                @component('components.card')
                    <h1>Contact formulier</h1>

                    <p class="lead">This is a demo for our tutorial dedicated to crafting working.</p>

                    <!-- We're going to place the form here in the next step -->
                    <div class="messages"></div>

                    <div class="controls">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Voornaam *</label>
                                    <input id="form_name" type="text" name="name" class="form-control">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">Achternaam *</label>
                                    <input id="form_lastname" type="text" name="surname" class="form-control" >
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_email">E-mail *</label>
                                    <input id="form_email" type="email" name="email" class="form-control">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_need">Orderwerp *</label>
                                    <select id="form_need" name="need" class="form-control">
                                        <option value=""></option>
                                        <option value="Request quotation">Request quotation</option>
                                        <option value="Request order status">Request order status</option>
                                        <option value="Request copy of an invoice">Request copy of an invoice</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Bericht / Opmerking *</label>
                                    <textarea id="form_message" name="message" class="form-control" rows="4"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success btn-send btn-block" value="Verstuur">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted">
                                    <strong>*</strong> These fields are required.
                            </div>
                        </div>
                    </div>
                @endcomponent

            </div>
            <div class="col-6">
                @component('components.card')
                    asdasd
                @endcomponent
                <br>
                @component('components.card')
                    asdasd
                @endcomponent
            </div>

        </div>
    </div>

@endsection

@push('css')

@endpush

@push('js')

@endpush
