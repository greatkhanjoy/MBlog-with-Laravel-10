@if ($paginator->hasPages())
<ul class="page-nav list-style text-center mt-20">
    @if ($paginator->onFirstPage())
        <li class="disabled" aria-disabled="true"><a href="#"  onclick="event.preventDefault();"><i class="flaticon-arrow-left"></i></a></li>
    @else
    <li><a href="{{$paginator->previousPageUrl()}}"><i class="flaticon-arrow-left"></i></a></li>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
        <li class="disabled" aria-disabled="true"><a href="#" onclick="event.preventDefault();">{{$element}}</a></li>
        @endif

        @if(is_array($element))
            @foreach ($element as $page => $url )
                @if ($page === $paginator->currentPage())
                <li><a class="active" href="#" onclick="event.preventDefault();">{{$page}}</a></li>
                @else
                <li><a href="{{$url}}">{{$page}}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
    <li><a href="{{$paginator->nextPageUrl()}}"><i class="flaticon-arrow-right"></i></a></li>
    @else
    <li class="disabled" aria-disabled="true"><a href="" onclick="event.preventDefault();"><i class="flaticon-arrow-right"></i></a></li>
    @endif
 </ul>
@endif