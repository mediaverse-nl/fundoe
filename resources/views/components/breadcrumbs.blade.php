@if ($breadcrumbs)
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!$breadcrumb->last)
                    <li class="{!! !str_contains(Request::route()->getName(), 'admin.') ? '' : 'breadcrumb-item' !!} gray-crumb">
                        @if($breadcrumb->first)
                            <i class="fa fa-home"></i>
                        @endif
                        <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                    </li>
                @else
                    <li class="{!! !str_contains(Request::route()->getName(), 'admin.') ? '' : 'breadcrumb-item' !!} faded-crumb active">
                        @if($breadcrumb->first)
                            <i class="fa fa-home"></i>
                        @endif
                        {{ $breadcrumb->title }}
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif
