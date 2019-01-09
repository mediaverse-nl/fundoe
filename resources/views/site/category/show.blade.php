@extends('layouts.app')

@section('content')

    <div class="container product-cards">
        <div class="row">
            <div class="col-sm-3">
                <p>Filter</p>

                <div class="card">
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Range input </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Min</label>
                                        <input type="number" class="form-control" id="inputEmail4" placeholder="$0">
                                    </div>
                                    <div class="form-group col-md-6 text-right">
                                        <label>Max</label>
                                        <input type="number" class="form-control" placeholder="$1,0000">
                                    </div>
                                </div>
                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- card-group-item.// -->
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Selection </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <div class="custom-control custom-checkbox">
                                    <span class="float-right badge badge-light round">52</span>
                                    <input type="checkbox" class="custom-control-input" id="Check1">
                                    <label class="custom-control-label" for="Check1">Samsung</label>
                                </div> <!-- form-check.// -->

                                <div class="custom-control custom-checkbox">
                                    <span class="float-right badge badge-light round">132</span>
                                    <input type="checkbox" class="custom-control-input" id="Check2">
                                    <label class="custom-control-label" for="Check2">Black berry</label>
                                </div> <!-- form-check.// -->

                                <div class="custom-control custom-checkbox">
                                    <span class="float-right badge badge-light round">17</span>
                                    <input type="checkbox" class="custom-control-input" id="Check3">
                                    <label class="custom-control-label" for="Check3">Samsung</label>
                                </div> <!-- form-check.// -->

                                <div class="custom-control custom-checkbox">
                                    <span class="float-right badge badge-light round">7</span>
                                    <input type="checkbox" class="custom-control-input" id="Check4">
                                    <label class="custom-control-label" for="Check4">Other Brand</label>
                                </div> <!-- form-check.// -->
                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- card-group-item.// -->
                </div> <!-- card.// -->

            </div>
            <div class="col-9">

                <div class="row">

                    @for($x = 0; $x <= 10; $x++)

                        <div class="col-12" style="padding: 10px 10px">
                            <div class="card">
                                <img class="card-img-top" src="http://placehold.it/700x400" alt="Card image cap" height="210px;">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="{!! route('site.activity.show', ['title-name', 1]) !!}" class="btn btn-sm btn-primary">Lees meer</a>
                                    <footer class="post-footer d-flex align-items-center" style="margin-top: 10px;">
                                        <div class="row">
                                            <div class="splitter-bar"><i class="fas fa-clock"></i> 2 months ago</div>
                                            <div class="splitter-bar"><i class="fas fa-comments"></i> 2 reviews</div>
                                        </div>
                                   </footer>
                                </div>
                            </div>
                        </div>

                    @endfor
                </div>

            </div>

        </div>
    </div>

@endsection

@push('css')
    <link href="{{ asset('/css/site/category.css') }}" rel="stylesheet">
@endpush

@push('js')

@endpush
