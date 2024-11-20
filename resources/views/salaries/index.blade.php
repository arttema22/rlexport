<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Salaries') }}&nbsp;({{$SalariesCount}}&nbsp;/&nbsp;{{$SalariesSum}})
            </h2>
            <x-link-button href="{{ route('salary.new') }}">
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
        <x-covers.cover-small>
            <x-index.table>
                <x-index.table-head>
                    <x-index.table-head-th>#</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Date')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Sum')}}</x-index.table-head-th>
                    <x-index.table-head-th></x-index.table-head-th>
                </x-index.table-head>
                <tbody>
                    @foreach ( $Salaries as $Salary )
                    <tr>
                        <x-index.table-td>{{$loop->iteration}}</x-index.table-td>
                        <x-index.table-td>{{$Salary->event_date->format(config('app.date_format'))}}
                        </x-index.table-td>
                        <x-index.table-td>{{$Salary->sum}}</x-index.table-td>
                        <x-index.table-td>
                            <div class="inline-flex items-center rounded-md shadow-sm">
                                <x-buttons.button-view href="{{ route('salary.show', $Salary) }}" />
                                <x-buttons.button-edit href="{{ route('salary.edit', $Salary) }}" />
                                <x-buttons.button-delete-form action="{{ route('salary.destroy', $Salary) }}" />
                            </div>
                        </x-index.table-td>
                    </tr>
                    @endforeach
                </tbody>
            </x-index.table>
        </x-covers.cover-small>
    </x-section>

    <x-section>
        <x-covers.cover-small-clear>
            <h3>{{__('Archive')}}</h3>
            <x-index.table>
                <x-index.table-head>
                    <x-index.table-head-th>#</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Date')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Sum')}}</x-index.table-head-th>
                    <x-index.table-head-th></x-index.table-head-th>
                </x-index.table-head>
                <tbody>
                    @foreach ( $Archives as $Archive )
                    <tr>
                        <x-index.table-td>{{$loop->iteration}}</x-index.table-td>
                        <x-index.table-td>{{$Archive->event_date->format(config('app.date_format'))}}</x-index.table-td>
                        <x-index.table-td>{{$Archive->sum}}</x-index.table-td>
                    </tr>
                    @endforeach
                </tbody>
            </x-index.table>
        </x-covers.cover-small-clear>
    </x-section>

</x-app-layout>