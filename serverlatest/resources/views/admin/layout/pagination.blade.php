@if ($paginator->hasPages())
    <div class="row">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-link disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo; Previous</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl()."&". request()->getQueryString() }}" rel="prev"
                       aria-label="@lang('pagination.previous')" class="page-link">&lsaquo; Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @php
                $startPage = max($paginator->currentPage() - 2, 1);
                $endPage = min($paginator->currentPage() + 2, $paginator->lastPage());
            @endphp

            @for ($page = $startPage; $page <= $endPage; $page++)
                @if ($page == $paginator->currentPage())
                    <li class="active" aria-current="page">
                        <a style="background-color: green; color: white;"
                           href="{{ $paginator->url($page) ."&". request()->getQueryString() }}"
                           class="page-link active">{{ $page }}</a>
                    </li>
                @else
                    <li><a href="{{ $paginator->url($page) }}" class="page-link">{{ $page }}</a></li>
                @endif
            @endfor

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl()."&". request()->getQueryString() }}" rel="next"
                       aria-label="@lang('pagination.next')" class="page-link">Next &rsaquo;</a>
                </li>
            @else
                <li class="page-link disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">Next &rsaquo;</span>
                </li>
            @endif
        </ul>
    </div>
    <div class="row">
        <strong>Displaying {{$paginator->perpage()}} Item from {{$paginator->total()}} Item</strong>
    </div>
@endif
