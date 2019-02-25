@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('site.faq') !!}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <h1 class="py-3">Frequently Asked Questions</h1>
                <div class="accordion" id="faq">
                    @foreach($faqs as $faq)
                        <div class="card">
                            <div class="card-header" id="heading{!! $loop->index !!}">
                                <h3 class="mb-0">
                                    <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapse{!! $loop->index !!}" aria-expanded="true" aria-controls="collapse{!! $loop->index !!}" style="width: 100%;">
                                        {!! $faq->title !!}
                                    </button>
                                </h3>
                            </div>
                            <div id="collapse{!! $loop->index !!}" class="collapse faq-container" aria-labelledby="heading{!! $loop->index !!}" data-parent="#faq">
                                <div class="card-body">
                                    {!! $faq->description !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>
                <br>
            </div>
        </div>
        <!--/row-->
    </div>
    <!--container-->



@endsection

@push('css')
    <style>
        #faq .card{
            border-radius: 0px;
        }
        #faq .card .card-header{
            background: #FFFFFF;
        }
        .faq-container{
            border-top: 1px solid rgba(0, 0, 0, 0.125);
            background: #fafafa;
            padding: 20px 15px;
        }
    </style>
@endpush

@push('js')

@endpush
