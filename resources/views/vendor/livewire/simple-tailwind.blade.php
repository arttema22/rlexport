<!--unformat-->
@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp
<!--unformat-->

<div>
    @if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-end">
        <span class="mr-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-200 bg-white border border-gray-200 cursor-default leading-5 rounded-md ">
                {!! __('pagination.previous') !!}
            </span>
            @else
            @if(method_exists($paginator,'getCursorName'))
            <button type="button" dusk="previousPage"
                wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->previousCursor()->encode() }}"
                wire:click="setPage('{{$paginator->previousCursor()->encode()}}','{{ $paginator->getCursorName() }}')"
                x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('pagination.previous') !!}
            </button>
            @else
            <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled"
                dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:border-gray-700 focus:outline-none active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('pagination.previous') !!}
            </button>
            @endif
            @endif
        </span>

        <span>
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            @if(method_exists($paginator,'getCursorName'))
            <button type="button" dusk="nextPage"
                wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->nextCursor()->encode() }}"
                wire:click="setPage('{{$paginator->nextCursor()->encode()}}','{{ $paginator->getCursorName() }}')"
                x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('pagination.next') !!}
            </button>
            @else
            <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled"
                dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:border-gray-700 focus:outline-none active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('pagination.next') !!}
            </button>
            @endif
            @else
            <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-200 bg-white border border-gray-200 cursor-default leading-5 rounded-md">
                {!! __('pagination.next') !!}
            </span>
            @endif
        </span>
    </nav>
    @endif
</div>