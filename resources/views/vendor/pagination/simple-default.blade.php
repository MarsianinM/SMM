@if ($paginator->hasPages())
    <nav>
        <ul class="pagination row">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled col " aria-disabled="true"><span>@lang('pagination.previous')</span></li>
            @else
                <li class="col "><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="col "><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
            @else
                <li class="disabled col " aria-disabled="true"><span>@lang('pagination.next')</span></li>
            @endif
        </ul>
    </nav>
@endif
