@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Anterior</a></li>
        

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)

                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                   
                @endforeach
            @endif
        @endforeach

      
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Siguiente</a></li>
        
    </ul>
@endif