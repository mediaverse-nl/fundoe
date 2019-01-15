@extends('layouts.app')

@section('content')
    <div class="container product-page">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="container-fliud">
                        <div class="wrapper row">
                            <div class="preview col-md-6">

                                <div class="preview-pic tab-content">
                                    <div class="tab-pane active" id="pic-1"><img src="http://placekitten.com/400/252" /></div>
                                    <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
                                    <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
                                    <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
                                    <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
                                </div>
                                <ul class="preview-thumbnail nav nav-tabs">
                                    <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                                    <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                                    <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                                    <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                                    <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                                </ul>

                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title">men's shoes fashion</h3>
                                <div class="rating">
                                    <div class="stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <span class="review-no">41 reviews</span>
                                </div>
                                <p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
                                <h4 class="price">Uur tarief: <span>$180</span></h4>
                                {{--<p class="vote"><strong>91%</strong> of buyers enjoyed this activity! <strong>(87 votes)</strong></p>--}}

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Datum</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>19-1-2018</option>
                                        <option>60 min</option>
                                        <option>75 min</option>
                                        <option>90 min</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Duur</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>45 min</option>
                                        <option>60 min</option>
                                        <option>75 min</option>
                                        <option>90 min</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Personen</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>


                                <div class="action">
                                    <button class="add-to-cart btn btn-default" type="button">add to cart</button>
                                    <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <br>

    <div class="container-fluid review-container">
        <div class="row">
            <div class="col-2">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>

            </div>
            <div class="col-2">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('css')
    <link href="{{ asset('/css/site/activity.css') }}" rel="stylesheet">
@endpush

@push('js')

@endpush
