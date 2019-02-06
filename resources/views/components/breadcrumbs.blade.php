@if ($breadcrumbs)
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!$breadcrumb->last)
                    <li class=" -item gray-crumb">
                        @if($breadcrumb->first)
                            <i class="fa fa-home"></i>
                        @endif
                        <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                    </li>
                @else
                    <li class=" -item faded-crumb active">
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
