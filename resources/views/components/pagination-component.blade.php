<div class="row mt-12 text-center">
    <ul class="pagination">
        <li class="page-item previous {{ ($paginator->currentPage() == 1) ? 'disabled' : '' }}"><a href="{{ $paginator->previousPageUrl() }}" class="page-link"><i class="previous"></i></a></li>
        @for($i = 0; $i < ceil($paginator->total() / $paginator->perPage()); $i++)
            <li class="page-item {{ ($paginator->currentPage() == ($i+1)) ? 'active' : '' }}"><a href="{{ route($route, 'page=' . $i+1) }}" class="page-link">{{ ($i+1) }}</a></li>
        @endfor
        <li class="page-item next {{ ($paginator->currentPage() == $paginator->lastPage()) ? 'disabled' : '' }}"><a href="{{ $paginator->nextPageUrl() }}"  class="page-link"><i class="next"></i></a></li>
    </ul>
</div>
