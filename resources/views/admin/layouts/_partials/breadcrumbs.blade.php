@if ($breadcrumbs)
    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!$breadcrumb->last)
                <li>
                    @if ($breadcrumb->first)
                        <i class="fa fa-dashboard"></i>
                    @endif
                    <a href="{{ $breadcrumb->url }}"> {{ $breadcrumb->title }}</a>
                </li>
            @else
                <li class="active">
                    @if ($breadcrumb->first)
                        <i class="fa fa-dashboard"></i>
                    @endif
                    {{ $breadcrumb->title }}
                </li>
            @endif
        @endforeach
    </ol>
@endif