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
                        <td class="pl-2">{{ $Refilling->event_date }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">{{ __('Volume') }}:</td>
                        <td class="pl-2">{{ $Refilling->volume }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">{{ __('Price') }}:</td>
                        <td class="pl-2">{{ $Refilling->price }}</td>
                    </tr>
                    <tr>
                        <td class="pr-2">{{ __('Sum') }}:</td>
                        <td class="pl-2">{{ $Refilling->sum }}</td>
                    </tr>
                    @if ($Refilling->truck)
                    <tr>
                        <td class="pr-2">{{ __('Truck') }}:</td>
                        <td class="pl-2">{{ $Refilling->truck->name }} {{ $Refilling->truck->reg_num_ru }}</td>
                    </tr>
                    @endif
                </table>
                @if ($Refilling->comment)
                <span>{{ __('Comment') }}:</span>
                <p>{{ $Refilling->comment }}</p>
                @endif


                <x-slot name="additional">
                    <h3 class="mb-2 text-lg font-medium text-gray-900">{{ __('Additional information') }}</h3>

                    <div class="flex justify-between">
                        <span>{{ __('Owner') }}</span>
                        @if ($Refilling->owner_id == 0)
                        <span>{{ $Refilling->driver->name }}</span>
                        @else
                        <span>{{ $Refilling->owner->name }}</span>
                        @endif
                    </div>

                    <div class="flex justify-between">
                        <span>{{ __('Driver') }}</span>
                        <span>{{ $Refilling->driver->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>{{ __('Created') }}</span>
                        <span>{{ $Refilling->created_at }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>{{ __('Updated') }}</span>
                        <span>{{ $Refilling->updated_at }}</span>
                    </div>
                </x-slot>

            </x-2-column-section>

            <x-buttons-group>
                <x-link-button href="{{ route('refilling.index') }}">
                    {{ __('Back') }}
                </x-link-button>

                <x-link href="{{ route('refilling.edit', $Refilling) }}">
                    {{ __('Edit') }}
                </x-link>
            </x-buttons-group>

        </x-cover-medium>
    </x-section>

</x-app-layout>
