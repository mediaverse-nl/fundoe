@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.dashboard') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-users"></i>
                    </div>
                    <div class="mr-5">{!! \App\User::count() !!} - users</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.user.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-calendar"></i>
                    </div>
                    <div class="mr-5">{!! \App\Event::where('start_datetime', '<=', \Carbon\Carbon::now()->addHours(48))->count() !!} - events</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.event.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-dark o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-search"></i>
                    </div>
                    <div class="mr-5">{!! \App\Seo::count()!!} - seo </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.seo-manager.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-white o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">{!! \App\Category::count()!!} - categories </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.category.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-trophy"></i>
                    </div>
                    <div class="mr-5">{!! \App\Activity::count() !!} - activities</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.activity.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning-orange o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-file"></i>
                    </div>
                    <div class="mr-5">File manager</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.file-manager.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-inbox"></i>
                    </div>
                    <div class="mr-5">{!! \App\Order::where('status', '=', 'paid')->count() !!} - new orders!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.order.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-question"></i>
                    </div>
                    <div class="mr-5">{!! \App\Faq::count() !!} F.A.Q. items</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{!! route('admin.faq.index') !!}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>
        .bg-white{
            background-color: #4a2bff !important;
        }
        .bg-warning-orange{
            background-color: #ff8e1b !important;
        }
    </style>
@endpush

@push('js')

@endpush
