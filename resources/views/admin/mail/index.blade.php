@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.event.index') !!}
@endsection

@section('content')





{{--    {!! dd($aFolder) !!}--}}

    {{--//Loop through every Mailbox--}}
    {{--/** @var \Webklex\IMAP\Folder $oFolder */--}}
    {{--@foreach($aFolder as $oFolder)--}}
{{--        {!! $oFolder !!}--}}
    {{--//Get all Messages of the current Mailbox $oFolder--}}
    {{--/** @var \Webklex\IMAP\Support\MessageCollection $aMessage */--}}
    {{--{!! ($oFolder->name) !!}--}}
        {{--{!! dd($oFolder->messages()) !!}--}}
    {{--/** @var \Webklex\IMAP\Message $oMessage */--}}
    {{--@foreach($oFolder->messages()->all()->get() as $oMessage)--}}
        {{--sometime <br>--}}
        {{--{!! dd() !!}--}}
        {{--@if($loop->index == 6)--}}
        {{--{!! dd($oMessage->getSubject()) !!}--}}
        {{--@endif--}}
    {{--echo $oMessage->getSubject().'<br />';--}}
    {{--echo 'Attachments: '.$oMessage->getAttachments()->count().'<br />';--}}
    {{--echo $oMessage->getHTMLBody(true);--}}

    {{--//Move the current Message to 'INBOX.read'--}}
    {{--if($oMessage->moveToFolder('INBOX.read') == true){--}}
    {{--echo 'Message has ben moved';--}}
    {{--}else{--}}
    {{--echo 'Message could not be moved';--}}
    {{--}--}}
    {{--@endforeach--}}

{{--@endforeach--}}

    {{--{}--}}
    {{--<table>--}}
        {{--<thead>--}}
        {{--<tr>--}}
            {{--<th>UID</th>--}}
            {{--<th>Subject</th>--}}
            {{--<th>From</th>--}}
            {{--<th>Attachments</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--@if($paginator->count() > 0)--}}
            {{--@foreach($paginator as $oMessage)--}}
                {{--<tr>--}}
                    {{--<td>{{$oMessage->getUid()}}</td>--}}
                    {{--<td>{{$oMessage->getSubject()}}</td>--}}
                    {{--<td>{{$oMessage->getFrom()[0]->mail}}</td>--}}
                    {{--<td>{{$oMessage->getAttachments()->count() > 0 ? 'yes' : 'no'}}</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
        {{--@else--}}
            {{--<tr>--}}
                {{--<td colspan="4">No messages found</td>--}}
            {{--</tr>--}}
        {{--@endif--}}
        {{--</tbody>--}}
    {{--</table>--}}

    {{--{{$paginator->links()}}--}}


    {{--<!-- DataTables Example -->--}}
    {{--@component('components.datatable')--}}
        {{--@slot('head')--}}
            {{--<th>id</th>--}}
            {{--<th>titel</th>--}}
            {{--<th>regio</th>--}}
            {{--<th>start</th>--}}
            {{--<th>duur</th>--}}
            {{--<th>prijs</th>--}}
            {{--<th>tickets</th>--}}
            {{--<th class="no-sort"></th>--}}
        {{--@endslot--}}
        {{--@slot('table')--}}
            {{--@foreach($events as $event)--}}
                {{--<tr class="{!!  \Carbon\Carbon::now() > $event->start_datetime  ? 'table-dark' : ''!!}--}}
                        {{--{!!  \Carbon\Carbon::now()->addHours(48) > $event->start_datetime ? 'table-danger' : ''!!}--}}
                        {{--{!!  \Carbon\Carbon::now()->addHours(100) > $event->start_datetime ? 'table-warning' : ''!!}">--}}
                    {{--<td>{!! $event->id !!}</td>--}}
                    {{--<td>{!! $event->activity->title !!}</td>--}}
                    {{--<td>{!! $event->activity->region !!}</td>--}}
                    {{--<td>{!! $event->start_datetime->format('d-m-y h:i') !!}</td>--}}
                    {{--<td>{!! $event->diffInTime() !!}min</td>--}}
                    {{--<td>€{!! number_format($event->price, 2)!!}</td>--}}
                    {{--<td>{!! $event->countSoldTickets() !!}/{!! $event->activity->min_number_of_people !!}~{!! $event->activity->max_number_of_people !!}</td>--}}
                    {{--<td>--}}
                        {{--@component('components.model', [--}}
                                {{--'id' => 'eventTableBtn'.$event->id,--}}
                                {{--'title' => 'Delete',--}}
                                {{--'actionRoute' => route('admin.event.destroy', $event->id),--}}
                                {{--'btnClass' => 'rounded-circle delete',--}}
                                {{--'btnIcon' => 'fa fa-trash'--}}
                            {{--])--}}
                            {{--@slot('description')--}}
                                {{--If u proceed u will delete all relations--}}
                            {{--@endslot--}}
                        {{--@endcomponent--}}
                        {{--<a href="{{route('admin.event.edit', $event->id)}}" class="rounded-circle edit">--}}
                            {{--<i class="fa fa-edit"></i>--}}
                        {{--</a>--}}
                    {{--</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
        {{--@endslot--}}
    {{--@endcomponent--}}

@endsection

@push('css')
    <style></style>
@endpush

@push('scripts')
    <script></script>
@endpush