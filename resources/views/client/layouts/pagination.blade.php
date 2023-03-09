@if ($paginator->hasPages())
<!-- Pagination -->
{{-- <div class="flex-wr-c-c m-rl--7 p-t-28">
    @foreach ($elements as $element)

    @if (is_string($element))
    <li class="page-item disabled"><a class="page-link">{{ $element }}</a></li>
    @endif

    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <a class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7 pagi-active">{{ $page }}</a>
    @else
    <a class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7" href="{{ $url }}">{{ $page }}</a>

    @endif
    @endforeach
    @endif
    @endforeach
</div> --}}

<div class="flex-wr-c-c m-rl--7 p-t-28">
@if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <a class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7" href="javascript: void(0);" aria-label="Previous">
                Trước
            </a>
        </li>
        @else
        <li class="page-item">
            <a class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                Trước
            </a>
        </li>
        @endif

         {{-- Custom next  --}}
         @if ($paginator->hasMorePages())
         <li class="page-item">
             <a class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                 Tiếp
             </a>
         </li>
         @else
         <li class="page-item disabled">
             <a class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7" href="javascript: void(0);" aria-label="Next">
                 Tiếp
             </a>
         </li>
         @endif
          {{-- Custom next  --}}
</div>
@endif