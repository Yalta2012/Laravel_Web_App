@if ($paginator->hasPages())
<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-4">
    <nav aria-label="Page navigation">
        <ul class="pagination mb-0">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>

    <form method="get" action="{{ url('property') }}" class="d-flex align-items-center gap-2">
        <label for="perpage" class="form-label mb-0 text-nowrap">Элементов на странице:</label>
        <select name="perpage" id="perpage" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
            <option value="3" @if($paginator->perPage() == 3) selected @endif>3</option>
            <option value="4" @if($paginator->perPage() == 4) selected @endif>4</option>
            <option value="5" @if($paginator->perPage() == 5) selected @endif>5</option>
            <option value="10" @if($paginator->perPage() == 10) selected @endif>10</option>
            <option value="15" @if($paginator->perPage() == 15) selected @endif>15</option>
        </select>
        @if(request()->has('search'))
            <input type="hidden" name="search" value="{{ request('search') }}">
        @endif
        @if(request()->has('sort'))
            <input type="hidden" name="sort" value="{{ request('sort') }}">
        @endif
    </form>

    <div class="text-muted text-nowrap">
        Показано с {{ $paginator->firstItem() }} по {{ $paginator->lastItem() }} из {{ $paginator->total() }} записей
    </div>
</div>
@endif