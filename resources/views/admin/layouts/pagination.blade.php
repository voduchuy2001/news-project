@if ($paginator->hasPages())
<nav class="mb-3">
    <ul class="pagination pagination-sm mb-0 justify-content-center">
        {{-- Custom previous  --}}
        @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @else
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @endif
        {{-- Custom previous  --}}

        {{-- @foreach ($elements as $element)

            @if (is_string($element))
                <li class="page-item disabled"><a class="page-link">{{ $element }}</a></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach --}}

        {{-- Custom next  --}}
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        @else
        <li class="page-item disabled">
            <a class="page-link" href="javascript: void(0);" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        @endif
         {{-- Custom next  --}}
    </ul>
</nav>
    
@endif