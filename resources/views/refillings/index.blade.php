<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Refillings') }}&nbsp;({{$RefillingsCount}}&nbsp;/&nbsp;{{$RefillingsSum}})
            </h2>
            <x-link-button href="{{ route('refilling.new') }}">
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
                    <x-index.table-head-th>{{__('Value')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Price')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Sum')}}</x-index.table-head-th>
                    <x-index.table-head-th></x-index.table-head-th>
                </x-index.table-head>
                <tbody>
                    @foreach ( $Refillings as $Refilling )
                    <tr class="{{ $Refilling->integration_id == null ? 'bg-red-50' : 'bg-inherit' }}">
                        <x-index.table-td>{{$loop->iteration}}</x-index.table-td>
                        <x-index.table-td>{{$Refilling->event_date->format(config('app.date_format'))}}
                        </x-index.table-td>
                        <x-index.table-td>{{$Refilling->volume}} л.</x-index.table-td>
                        <x-index.table-td>{{$Refilling->price}} руб.</x-index.table-td>
                        <x-index.table-td>{{$Refilling->sum}} руб.</x-index.table-td>

                        <x-index.table-td>
                            <div class="inline-flex items-center rounded-md shadow-sm">
                                @if ($Refilling->integration_id == null)
                                <x-buttons.button-view href="{{ route('refilling.show', $Refilling) }}" />
                                <x-buttons.button-edit href="{{ route('refilling.edit', $Refilling) }}" />
                                <x-buttons.button-delete action="{{ route('refilling.destroy', $Refilling) }}" />
                                @else
                                <x-buttons.button-view href="{{ route('refilling.show', $Refilling) }}" />
                                @endif
                            </div>
                        </x-index.table-td>
                    </tr>
                    @endforeach
                </tbody>
            </x-index.table>
        </x-cover-medium>
    </x-section>

    <x-section>
        <x-cover-medium-clear>
            <h3>{{__('Archive')}}</h3>
            <x-index.table>
                <x-index.table-head>
                    <x-index.table-head-th>#</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Date')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Sum')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Comment')}}</x-index.table-head-th>
                    <x-index.table-head-th></x-index.table-head-th>
                </x-index.table-head>
                <tbody>
                    @foreach ( $Archives as $Archive )
                    <tr>
                        <x-index.table-td>{{$loop->iteration}}</x-index.table-td>
                        <x-index.table-td>{{$Archive->refilling_date}}</x-index.table-td>
                        <x-index.table-td>{{$Archive->sum}}</x-index.table-td>
                        <x-index.table-td>{{$Archive->comment}}</x-index.table-td>
                    </tr>
                    @endforeach
                </tbody>
            </x-index.table>
        </x-cover-medium-clear>
    </x-section>

</x-app-layout>
