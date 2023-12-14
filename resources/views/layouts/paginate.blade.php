    <ul>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li>
                <a class="disabled" aria-disabled="true" class="prev" href="{{ $paginator->previousPageUrl() }}"><i
                        class="ion-ios-arrow-left"></i></a>
            </li>
        @else
            <li>
                <a class="prev" href="{{ $paginator->previousPageUrl() }}"><i class="ion-ios-arrow-left"></i></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><a class="active" href="{{ $url }}">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="next" href="{{ $paginator->nextPageUrl() }}"><i class="ion-ios-arrow-right"></i></a>
            </li>
        @else
            <li aria-disabled="true">
                <a class="disabled" aria-disabled="true" class="next" href="#"><i
                        class="ion-ios-arrow-right"></i></a>
            </li>
        @endif
    </ul>
