@php
  /** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Contracts\Pagination\Paginator $paginator */
@endphp

@if ($paginator->hasPages())
  <nav class="center" aria-label="Paginação">
    <div class="hero__actions" style="margin:0;">
      @if ($paginator->onFirstPage())
        <span class="btn btn--disabled" aria-disabled="true">← Anterior</span>
      @else
        <a class="btn btn--outline" href="{{ $paginator->previousPageUrl() }}" rel="prev">← Anterior</a>
      @endif

      @if ($paginator->hasMorePages())
        <a class="btn btn--outline" href="{{ $paginator->nextPageUrl() }}" rel="next">Próxima →</a>
      @else
        <span class="btn btn--disabled" aria-disabled="true">Próxima →</span>
      @endif
    </div>
  </nav>
@endif

