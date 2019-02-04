<!-- Button trigger modal -->
<a class="{!! $btnClass !!}" data-toggle="tooltip" data-placement="top" title="{!! $tooltip or '' !!}" style="color: #FFFFFF;">
    <div data-toggle="modal" data-target="#{!! $id !!}" data-placement="top">
        <i class="{!! $btnIcon or '' !!}" style="color: #FFFFFF !important;" ></i>
        @if(!empty($btnTitle))
            {!! $btnTitle !!}
        @endif
    </div>
</a>

<!-- Modal -->
<div class="modal fade" id="{!! $id !!}" tabindex="-1" role="dialog" aria-labelledby="{!! $id !!}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{!! $id !!}Label">{!! $title !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $description or ''!!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" style="border-radius: 0px;" data-dismiss="modal">Close</button>
                @if(str_contains($title, 'Delete') || str_contains($title, 'Restore'))
                    {!! Form::open(['url' => $actionRoute, 'method' => 'delete']) !!}
                        {!! Form::submit('Proceed', ['class' => 'btn btn-primary', 'style' => "border-radius: 0px;"]) !!}
                    {!! Form::close() !!}
                @elseif(str_contains($title, 'Edit'))
                    {!! Form::submit('Proceed', ['class' => 'btn btn-primary', 'style' => "border-radius: 0px;"]) !!}
                @elseif(str_contains($title, 'Create'))
                    {!! Form::submit('Proceed', ['class' => 'btn btn-primary', 'style' => "border-radius: 0px;"]) !!}
                @else
                    <a class="btn btn-primary" href="{{$actionRoute}}" style="border-radius: 0px;">Proceed</a>
                @endif
            </div>
        </div>
    </div>
</div>