@if ($paginator->hasPages())

        <div class="center">
            <ul class="pagination">
                 {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a class="page-link" href="#">&laquo;</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif


             {{-- Pagination Elements --}}
             @foreach ($elements as $element)
             {{-- "Three Dots" Separator --}}
             @if (is_string($element))
                 <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
             @endif

             {{-- Array Of Links --}}
             @if (is_array($element))
                 @foreach ($element as $page => $url)
                     @if ($page == $paginator->currentPage())
                         <li class="page-item active" aria-current="page">
                            <a class="page-link" href="{{$url}}">{{$page}}</a>
                        </li>
                     @else
                         <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                     @endif
                 @endforeach
             @endif
         @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
            </li>
        @else
            <li class="page-item" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a class="page-link" href="#">&raquo;</a>
            </li>
        @endif



              
              {{-- <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active"><a class="page-link" href="#">2</a></li> --}}
              {{-- <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> --}}
            </ul>
          </div>

@endif