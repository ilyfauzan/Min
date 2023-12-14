<ul class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
    @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link">←</a>
        </li>
    @else
        <li class="page-item">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link">←</a>
        </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="page-item disabled">
                <a href="#" class="page-link">{{ $element }}</a>
            </li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active">
                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a href="{{ $paginator->nextPageUrl() }}" class="page-link">→</a>
        </li>
    @else
        <li class="page-item disabled">
            <a href="{{ $paginator->nextPageUrl() }}" class="page-link">→</a>
        </li>
    @endif
</ul>
