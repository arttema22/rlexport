<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View') }}
        </h2>
    </x-slot>

    <x-section>
        <x-cover-medium>
            <x-2-column-section>

                <h3 class="mb-2 text-lg font-medium text-gray-900">{{ __('Main information') }}</h3>
                <table class="table-fixed">
                    <tr>
                        <td class="pr-2">{{ __('Date') }}:</td>
                        <td class="pl-2">{{ $BusinessTrip->b_trip_date }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">{{ __('Sum') }}:</td>
                        <td class="pl-2">{{ $BusinessTrip->sum }}</td>
                    </tr>
                </table>
                @if ($BusinessTrip->comment)
                <span>{{ __('Comment') }}:</span>
                <p>{{ $BusinessTrip->comment }}</p>
                @endif

                <x-slot name="additional">
                    <h3 class="mb-2 text-lg font-medium text-gray-900">{{ __('Additional information') }}</h3>

                    <div class="flex justify-between">
                        <span>{{ __('Owner') }}</span>
                        @if ($BusinessTrip->owner_id == 0)
                        <span>{{ $BusinessTrip->driver->name }}</span>
                        @else
                        <span>{{ $BusinessTrip->owner->name }}</span>
                        @endif
                    </div>

                    <div class="flex justify-between">
                        <span>{{ __('Driver') }}</span>
                        <span>{{ $BusinessTrip->driver->name }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span>{{ __('Created') }}</span>
                        <span>{{ $BusinessTrip->created_at }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span>{{ __('Updated') }}</span>
                        <span>{{ $BusinessTrip->updated_at }}</span>
                    </div>

                </x-slot>

            </x-2-column-section>

            <x-buttons-group>
                <x-link-button href="{{ route('b-trip.index') }}">
                    {{ __('Back') }}
                </x-link-button>

                <x-link href="{{ route('b-trip.edit', $BusinessTrip) }}">
                    {{ __('Edit') }}
                </x-link>
            </x-buttons-group>

        </x-cover-medium>
    </x-section>

</x-app-layout>
