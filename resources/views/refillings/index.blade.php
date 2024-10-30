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
                    <x-index.table-head-th>#</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Date')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Sum')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Petrol station')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Truck')}}</x-index.table-head-th>
                    <x-index.table-head-th>{{__('Comment')}}</x-index.table-head-th>
                    <x-index.table-head-th></x-index.table-head-th>
                </x-index.table-head>
                <tbody>
                    @foreach ( $Refillings as $Refilling )
                    <tr class="{{ $Refilling->integration_id == null ? 'bg-red-50' : 'bg-inherit' }}">
                        <x-index.table-td>{{$loop->iteration}}</x-index.table-td>
                        <x-index.table-td>{{$Refilling->refilling_date}}</x-index.table-td>
                        <x-index.table-td>{{$Refilling->volume}} л. <br>
                            {{$Refilling->sum}} руб.
                        </x-index.table-td>

                        <x-index.table-td>{{$Refilling->petrolBrand->name}} <br>
                            {{$Refilling->petrolStation->address}}
                        </x-index.table-td>

                        <x-index.table-td>
                            @cannot($Refilling->truck_id)
                            {{$Refilling->truck->reg_num_ru}}<br>
                            {{$Refilling->truck->name}}
                            @else
                            <span>-</span>
                            @endcannot
                        </x-index.table-td>

                        <x-index.table-td>
                            @if ($Refilling->integration_id == null)
                            <div class="inline-flex items-center rounded-md shadow-sm">
                                <x-index.button-view href="{{ route('refilling.show', $Refilling) }}" />
                                <x-index.button-edit href="{{ route('refilling.edit', $Refilling) }}" />
                                <x-index.button-delete action="{{ route('refilling.destroy', $Refilling) }}" />
                            </div>
                            @endif
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
