@extends('layouts.app')

@section('content')

   <div class="container" id="main">
       <div class="row">
           <h1 class="col-md-12 text-center">404</h1>
           <div class="col-md-12 text-center">
               <h1 class="font-weight-normal lead" id="desc">Deze webpagina is niet beschikbaar.</h1>
           </div>
        </div>
   </div>
    
@endsection

@push('css')
    <style>
        #main {
            margin-top: 18vh;
        }
        .h1, h1 {
            font-size: 6.5rem;
        }
        .font-weight-normal {
            font-weight: 500 !important;
        }
        .lead {
            font-size: 1.8rem;
            font-weight: 300;
        }
    </style>
@endpush
