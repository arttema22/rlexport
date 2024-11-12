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
        <x-cover-medium>
            <x-index.table>
                <x-index.table-head>
                    <x-index.table-head-th>#</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Date')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Sum')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Comment')}}</x-index.table-head-th>
                    <x-index.table-head-th></x-index.table-head-th>
                </x-index.table-head>
                <tbody>
                    @foreach ( $Salaries as $Salary )
                    <tr>
                        <x-index.table-td>{{$loop->iteration}}</x-index.table-td>
                        <x-index.table-td>{{$Salary->event_date->format(config('app.date_format'))}}</x-index.table-td>
                        <x-index.table-td>{{$Salary->sum}}</x-index.table-td>
                        <x-index.table-td>{{$Salary->comment}}</x-index.table-td>
                        <x-index.table-td>
                            <div class="inline-flex items-center rounded-md shadow-sm">
                                <x-index.button-view href="{{ route('salary.show', $Salary) }}" />
                                <x-index.button-edit href="{{ route('salary.edit', $Salary) }}" />
                                <x-index.button-delete action="{{ route('salary.destroy', $Salary) }}" />
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
                        <x-index.table-td>{{$Archive->event_date->format(config('app.date_format'))}}</x-index.table-td>
                        <x-index.table-td>{{$Archive->sum}}</x-index.table-td>
                        <x-index.table-td>{{$Archive->comment}}</x-index.table-td>
                    </tr>
                    @endforeach
                </tbody>
            </x-index.table>
        </x-cover-medium-clear>
    </x-section>

</x-app-layout>
