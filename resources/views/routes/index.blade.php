<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Routes') }}&nbsp;({{$RoutesCount}}&nbsp;/&nbsp;{{$RoutesSum}})
            </h2>
            <x-link-button href="{{ route('route.new') }}">
                {{ __('New') }}
            </x-link-button>
        </div>
        @if(session('success'))
        <x-alerts.success></x-alerts.success>
        @endif
        @if(session('info'))
        <x-alerts.info></x-alerts.info>
        @endif
    </x-slot>

    <x-section>
        <x-cover-medium>
            <x-index.table>
                <x-index.table-head>
                    <x-index.table-head-th>#</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Date')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Route')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Sum')}}</x-index.table-head-th>
                    <x-index.table-head-th></x-index.table-head-th>
                    <x-index.table-head-th></x-index.table-head-th>
                </x-index.table-head>
                <tbody>
                    @foreach ( $Routes as $Route )
                    <tr>
                        <x-index.table-td>{{$loop->iteration}}</x-index.table-td>
                        <x-index.table-td>{{$Route->event_date->format('d.m.Y')}}</x-index.table-td>
                        <x-index.table-td>{{$Route->number_trips}} {{$Route->address_loading}} -
                            {{$Route->address_unloading}}</x-index.table-td>
                        <x-index.table-td>{{$Route->sum}}</x-index.table-td>
                        <x-index.table-td>
                            <div class="inline-flex items-center rounded-md shadow-sm">
                                <x-buttons.button-view href="{{ route('route.show', $Route) }}" />
                                <x-buttons.button-edit href="{{ route('route.edit', $Route) }}" />
                                <x-buttons.button-delete action="{{ route('route.destroy', $Route) }}" />
                            </div>
                        </x-index.table-td>
                    </tr>
                    @endforeach
                </tbody>
            </x-index.table>

        </x-cover-medium>
    </x-section>

</x-app-layout>