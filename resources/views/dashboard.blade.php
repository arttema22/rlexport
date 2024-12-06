<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    @livewire('Salary.SalaryManager')

    {{-- @livewire('Salary.SalaryArchive') --}}


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        {{__('Welcome to your Logist application!')}}
                    </h1>

                    <div class="mt-6 text-gray-500 leading-relaxed">
                        <div class="flex gap-4 flex-wrap">
                            <!-- Routes -->
                            <x-dashboard.card-dashboard>
                                <x-dashboard.card-dashboard-title>
                                    <a href="{{route('route.index')}}">{{__('Routes')}}</a>
                                </x-dashboard.card-dashboard-title>
                                <x-dashboard.card-dashboard-data>
                                    {{$RoutesCount}} / {{$RoutesSum}}
                                </x-dashboard.card-dashboard-data>
                                <span class="text-gray-400 text-sm mt-1">{{__('Count')}} / {{__('Sum')}}</span>
                                <x-dashboard.card-dashboard-link href="{{route('route.new')}}">
                                    {{__('New')}}
                                    <x-dashboard.card-dashboard-link-img />
                                </x-dashboard.card-dashboard-link>
                            </x-dashboard.card-dashboard>

                            <!-- Salaries -->
                            @livewire('Salary.SalaryCard')

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
                                    <a href="{{route('b-trip.index')}}">{{__('Business Trips')}}</a>
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


                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                    <nav aria-label="Progress">
                        <ol role="list" class="space-y-4 md:flex md:space-x-8 md:space-y-0">
                            <li class="md:flex-1">
                                <div
                                    class="group flex flex-col border-l-4 border-black py-2 pl-4 hover:border-gray-300 md:border-l-0 md:border-t-4 md:pb-0 md:pl-0 md:pt-4">
                                    <span
                                        class="text-sm font-medium text-gray-500 group-hover:text-gray-700">saldo</span>
                                    <span class="text-sm font-medium">saldo</span>
                                </div>
                            </li>

                            <li class="md:flex-1">
                                <div class="flex flex-col border-l-4 border-gray-300 py-2 pl-4 md:border-l-0 md:border-t-4 md:pb-0 md:pl-0 md:pt-4"
                                    aria-current="step">
                                    <span class="text-sm font-medium text-gray-600">{{__('Routes')}}</span>
                                    <span class="text-sm font-medium">{{$RoutesSum}}</span>
                                </div>
                            </li>

                            <!-- Salaries -->
                            @livewire('Salary.SalaryBadge')

                            <li class="md:flex-1">
                                <div class="flex flex-col border-l-4 border-gray-300 py-2 pl-4 md:border-l-0 md:border-t-4 md:pb-0 md:pl-0 md:pt-4"
                                    aria-current="step">
                                    <span class="text-sm font-medium text-gray-600">{{__('Refillings')}}</span>
                                    <span class="text-sm font-medium">{{$RefillingsSum}}</span>
                                </div>
                            </li>

                            <li class="md:flex-1">
                                <div class="flex flex-col border-l-4 border-gray-300 py-2 pl-4 md:border-l-0 md:border-t-4 md:pb-0 md:pl-0 md:pt-4"
                                    aria-current="step">
                                    <span class="text-sm font-medium text-gray-600">{{__('Business Trips')}}</span>
                                    <span class="text-sm font-medium">{{$BtripsSum}}</span>
                                </div>
                            </li>

                            <li class="md:flex-1">
                                <div
                                    class="group flex flex-col border-l-4 border-red-600 py-2 pl-4 hover:border-red-800 md:border-l-0 md:border-t-4 md:pb-0 md:pl-0 md:pt-4">
                                    <span
                                        class="text-sm font-medium text-red-600 group-hover:text-red-800">{{__('Total')}}</span>
                                    <span class="text-sm font-medium">{{$Total}}</span>
                                </div>
                            </li>

                            <li class="md:flex-1">
                                <div
                                    class="group flex flex-col border-l-4 border-black py-2 pl-4 hover:border-gray-300 md:border-l-0 md:border-t-4 md:pb-0 md:pl-0 md:pt-4">
                                    <span
                                        class="text-sm font-medium text-gray-500 group-hover:text-gray-700">saldo</span>
                                    <span class="text-sm font-medium">saldo</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>


                <x-welcome />

            </div>
        </div>
    </div>
</x-app-layout>
