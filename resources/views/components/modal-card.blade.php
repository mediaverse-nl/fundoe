{{--<!-- Large modal -->--}}
<button type="button" class="btn btn-sm btn-block btn-warning" data-toggle="modal" data-target=".bd-modal-lg-{!! $targetId !!}">boek nu</button>

<div class="modal{!! (Session::has('id') && $targetId == Session::get('id')) ? '' : ' fade' !!} bd-modal-lg-{!! $targetId !!}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" style="background: #F7F7F7 !important;">
                <h4 class="modal-title">{!! $title !!}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <iframe width="100%" height="100%" frameborder="0" class="clearfix" style="border:0"
                                src="https://www.google.com/maps/embed/v1/place?q={!! $event->activity->region !!}&zoom=11&key=AIzaSyCkb7vvU9U7_uvJxXdADV4P1BMZv_6Zfas" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-6">
                        <b>Eindigt over: </b><br>

                        <h3 class="" style="" data-countdown="{!! $event->timeToOrder('Y/m/d H:i:s') !!}">{!! $event->timeToOrder('Y/m/d H:i:s') !!}</h3>
                        <div class="form-group">
                            <b>Start op</b><br>
                            {!! $event->start_datetime->format('d-m-y h:i') !!}
                        </div>

                        <div class="form-group">
                            <b>Regio</b><br>
                            {!! $event->activity->region !!}
                        </div>

                        <div class="form-group">

                            {{--{!! $errors->first('*') !!}--}}
                            <b>Beschrijving</b><br>
                            {!! $event->activity->description !!}
                        </div>


                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {!! Session::has('activityType') ? (Session::get('activityType') == 'public' ? 'active':'') : 'active'!!}" id="public-tab" data-toggle="tab" href="#public{!! $event->id !!}" role="tab" aria-controls="public" aria-selected="true">Publieke activiteit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {!! Session::has('activityType') ? (Session::get('activityType') == 'group' ? 'active':'') : ''!!}" id="group-tab" data-toggle="tab" href="#group{!! $event->id !!}" role="tab" aria-controls="group" aria-selected="false">Groups activiteit</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="public{!! $event->id !!}" role="tabpanel" aria-labelledby="public-tab">

                                @if(isset($form) ? $form : true)
                                    {!! Form::open(['route' => ['site.order.store.public'], 'method' => 'POST']) !!}
                                @endif
                                {!! Form::hidden('id', $targetId) !!}
                                <br>
                                <div class="form-group">
                                    <h3><small>Prijs </small> € {!! $event->price !!} <small>p.p.</small></h3>
                                </div>

                                <div class="form-group">
                                    <b>tickets</b>
                                    {!! Form::select('tickets', range(1, $event->activity->max_number_of_people), null, ['class' => 'form-control'.(!$errors->has('tickets') ? '': ' is-invalid ')]) !!}
                                    @include('components.error', ['field' => 'tickets'])
                                </div>

                                <div class="custom-control custom-checkbox">
                                    {!! Form::checkbox('voorwaarden', null, false,['class' => 'custom-control-input'.(!$errors->has('voorwaarden') ? '': ' is-invalid '), 'id' => 'algemeneVoorwaarden'.$event->id]) !!}
                                    <label class="custom-control-label" for="{!! 'algemeneVoorwaarden'.$event->id !!}">
                                        Ik ga akkoord met de met de <a href="{!! route('site.terms') !!}"><b>algemene voorwaarden</b></a> en
                                        <a href="{!! route('site.privacy') !!}"><b>privacy verklaring</b></a> van fundoe.nl
                                    </label>
                                    @include('components.error', ['field' => 'voorwaarden'])
                                </div>
                                <br>

                                @if(isset($form) ? $form : true)
                                    <input type="submit" class="btn btn-block btn-success" value="betalen">
                                @endif
                                @if(isset($form) ? $form : true)
                                    {!! Form::close() !!}
                                @endif
                            </div>
                            <div class="tab-pane fade" id="group{!! $event->id !!}" role="tabpanel" aria-labelledby="group-tab">
                                <br>
                                @if(isset($form) ? $form : true)
                                    {!! Form::open(['route' => ['site.order.store.group'], 'method' => 'POST']) !!}
                                @endif
                                <div class="form-group">
                                    <h3><small>Prijs per uur </small> € {!! $event->activity->price_per_hour !!} <small>p.p.</small></h3>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <b>Aantal tickets</b>
                                        {!! Form::select('tickets', range($event->activity->min_number_of_people, $event->activity->max_number_of_people, 2), null, ['class' => 'form-control'.(!$errors->has('tickets') ? '': ' is-invalid ')]) !!}
                                        @include('components.error', ['field' => 'tickets'])
                                    </div>

                                    <div class="form-group col-md-6">
                                        <b>Duur van activiteit</b>
                                        {!! Form::select('duur', range($event->activity->min_duration, 480, 15), null, ['class' => 'form-control'.(!$errors->has('tickets') ? '': ' is-invalid ')]) !!}
                                        @include('components.error', ['field' => 'tickets'])
                                    </div>
                                </div>

                                <div class="form-group">
                                    <b>Selecteer een datum en tijd</b>
                                    <div class="input-group datetimepicker" id="datetimepicker{!! $targetId !!}" data-target-input="nearest" data-date-min-date="0" data-date-today-highlight="true" data-date-format="YYYY-MM-DD HH:mm" style="margin-bottom: 5px; border-radius: 5px;">
                                        <div class="input-group-append" data-target="#datetimepicker{!! $targetId !!}" data-toggle="datetimepicker"  style="-moz-border-radius-bottomleft: .25rem;">
                                            <div class="input-group-text" style="border-right: none;"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        {!! Form::text('start_datetime', null, ['class' => 'datetimepicker-input form-control'.(!$errors->has('start_datetime') ? '': ' is-invalid '), 'data-toggle' => 'datetimepicker', 'data-target' => '#datetimepicker'.$targetId]) !!}
                                    </div>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    {!! Form::checkbox('voorwaarden', null, false,['class' => 'custom-control-input'.(!$errors->has('voorwaarden') ? '': ' is-invalid '), 'id' => 'algemeneVoorwaardenA'.$event->id]) !!}
                                    <label class="custom-control-label" for="{!! 'algemeneVoorwaardenA'.$event->id !!}">
                                        Ik ga akkoord met de met de <a href="{!! route('site.terms') !!}"><b>algemene voorwaarden</b></a> en
                                        <a href="{!! route('site.privacy') !!}"><b>privacy verklaring</b></a> van fundoe.nl
                                    </label>
                                    @include('components.error', ['field' => 'voorwaarden'])
                                </div>
                                <br>
                                @if(isset($form) ? $form : true)
                                    <input type="submit" class="btn btn-block btn-success" value="betalen">
                                @endif
                                @if(isset($form) ? $form : true)
                                    {!! Form::close() !!}
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@if(Session::has('id') && $targetId == Session::get('id'))
    @push('js')
        <script type="text/javascript">
            $(window).on('load',function(){
                $('.bd-modal-lg-{!! $targetId !!}').modal('show');
            });


        </script>
    @endpush
@endif
