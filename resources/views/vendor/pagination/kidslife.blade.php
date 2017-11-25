<!--pagination starts-->
@if ($paginator->hasPages())
<div class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <div class="prev-post"></div>
    @else
        <div class="prev-post"><a href="{{ $paginator->previousPageUrl() }}"><span class="fa fa-angle-double-left"> Trang Trước</span></a></div>
    @endif
    <ul>
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled">{{ $element }}</li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active-page">{{ $page }}</li>
                    @else
                        <li><a class="inactive" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <div class="next-post"><a href="{{ $paginator->nextPageUrl() }}">Trang Sau <span class="fa fa-angle-double-right"></span></a></div>
    @else
        <div class="next-post"></div>
    @endif

</div>
@endif
<!--pagination ends-->