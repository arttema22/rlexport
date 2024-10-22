<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Refillings') }}
            </h2>
            <x-link-button href="{{ route('refilling.new') }}">
                {{ __('New') }}
            </x-link-button>
        </div>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </x-slot>

    <x-section>
        <x-cover-medium>
            <x-index.table>
                <x-index.table-head>
                    <x-index.table-head-th>{{__('Date')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Sum')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Comment')}}</x-index.table-head-th>
                    <x-index.table-head-th></x-index.table-head-th>
                </x-index.table-head>
                <tbody>
                    @foreach ( $Refillings as $Refilling )
                    <x-index.table-td>{{$Refilling->refilling_date}}</x-index.table-td>
                    <x-index.table-td>{{$Refilling->sum}}</x-index.table-td>
                    <x-index.table-td>{{$Refilling->comment}}</x-index.table-td>
                    <x-index.table-td>
                        <div class="inline-flex items-center rounded-md shadow-sm">
                            <x-index.button-view href="{{ route('refilling.show', $Refilling) }}" />
                            <x-index.button-edit href="{{ route('refilling.edit', $Refilling) }}" />
                            <x-index.button-delete action="{{ route('refilling.destroy', $Refilling) }}" />
                        </div>
                    </x-index.table-td>
                    </tr>
                    @endforeach
                </tbody>
            </x-index.table>
        </x-cover-medium>
    </x-section>

</x-app-layout>