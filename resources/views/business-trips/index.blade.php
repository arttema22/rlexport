<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Business Trips') }}
            </h2>
            <x-link-button href="{{ route('b-trip.new') }}">
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
                    @foreach ( $BusinessTrips as $BusinessTrip )
                    <tr>
                        <x-index.table-td>{{$BusinessTrip->b_trip_date}}</x-index.table-td>
                        <x-index.table-td>{{$BusinessTrip->sum}}</x-index.table-td>
                        <x-index.table-td>{{$BusinessTrip->comment}}</x-index.table-td>
                        <x-index.table-td>
                            <div class="inline-flex items-center rounded-md shadow-sm">
                                <x-index.button-view href="{{ route('b-trip.show', $BusinessTrip) }}" />
                                <x-index.button-edit href="{{ route('b-trip.edit', $BusinessTrip) }}" />
                                <x-index.button-delete action="{{ route('b-trip.destroy', $BusinessTrip) }}" />
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
                    <x-index.table-head-th>{{__('Date')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Sum')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Comment')}}</x-index.table-head-th>
                    <x-index.table-head-th></x-index.table-head-th>
                </x-index.table-head>
                <tbody>
                    @foreach ( $Archives as $Archive )
                    <tr>
                        <x-index.table-td>{{$Archive->b_trip_date}}</x-index.table-td>
                        <x-index.table-td>{{$Archive->sum}}</x-index.table-td>
                        <x-index.table-td>{{$Archive->comment}}</x-index.table-td>
                    </tr>
                    @endforeach
                </tbody>
            </x-index.table>
        </x-cover-medium-clear>
    </x-section>

</x-app-layout>