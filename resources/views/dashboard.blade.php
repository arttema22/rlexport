<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        {{__('Welcome to your Logist application!')}}
                    </h1>

                    <div class="mt-6 text-gray-500 leading-relaxed">
                        <div class="flex gap-4 flex-wrap">
                            <!-- Salaries -->
                            <x-dashboard.card-dashboard>
                                <x-dashboard.card-dashboard-title>
                                    <a href="{{route('salary.index')}}">{{__('Salaries')}}</a>
                                </x-dashboard.card-dashboard-title>
                                <x-dashboard.card-dashboard-data>
                                    {{$SalariesCount}} / {{$SalariesSum}}
                                </x-dashboard.card-dashboard-data>
                                <span class="text-gray-400 text-sm mt-1">{{__('Count')}} / {{__('Sum')}}</span>
                                <x-dashboard.card-dashboard-link href="{{route('salary.new')}}">
                                    {{__('New')}}
                                    <x-dashboard.card-dashboard-link-img />
                                </x-dashboard.card-dashboard-link>
                            </x-dashboard.card-dashboard>

                            <!-- Refillings -->
                            <x-dashboard.card-dashboard>
                                <x-dashboard.card-dashboard-title>
                                    <a href="{{route('refilling.index')}}">{{__('Refillings')}}</a>
                                </x-dashboard.card-dashboard-title>
                                <x-dashboard.card-dashboard-data>
                                    {{$RefillingsCount}} / {{$RefillingsSum}}
                                </x-dashboard.card-dashboard-data>
                                <span class="text-gray-400 text-sm mt-1">{{__('Count')}} / {{__('Sum')}}</span>
                                <x-dashboard.card-dashboard-link href="{{route('refilling.new')}}">
                                    {{__('New')}}
                                    <x-dashboard.card-dashboard-link-img />
                                </x-dashboard.card-dashboard-link>
                            </x-dashboard.card-dashboard>

                            <!-- Business Trips -->
                            <x-dashboard.card-dashboard>
                                <x-dashboard.card-dashboard-title>
                                    <a href="{{route('b-trip.index')}}">{{ __('Business Trips') }}</a>
                                </x-dashboard.card-dashboard-title>
                                <x-dashboard.card-dashboard-data>
                                    {{$BtripsCount}} / {{$BtripsSum}}
                                </x-dashboard.card-dashboard-data>
                                <span class="text-gray-400 text-sm mt-1">{{__('Count')}} / {{__('Sum')}}</span>
                                <x-dashboard.card-dashboard-link href="{{route('b-trip.new')}}">
                                    {{__('New')}}
                                    <x-dashboard.card-dashboard-link-img />
                                </x-dashboard.card-dashboard-link>
                            </x-dashboard.card-dashboard>
                        </div>
                    </div>
                </div>
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>