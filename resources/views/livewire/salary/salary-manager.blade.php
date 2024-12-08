<div class="relative max-w-6xl h-[350px] mx-auto p-4 bg-gray-50 overflow-hidden border sm:rounded-lg">

    <x-blocks.list>
        <x-slot name="title">
            <x-blocks.title>
                {{__('Salaries')}}
            </x-blocks.title>
            <x-blocks.btn-round-new wire:click="create" title="{{__('New salary')}}" />
        </x-slot>
        <x-slot name="header">
            <div class="w-1/3">{{__('Date')}}</div>
            <div class="w-1/3">{{__('Sum')}}</div>
            <div class="w-1/3">{{__('Comment')}}</div>
        </x-slot>
        <x-slot name="content">
            @foreach ( $salaries as $salary )
            <x-blocks.accordion>
                <x-blocks.btn-accordion>
                    <div class="w-1/3">{{$salary->event_date->format(config('app.date_format'))}}</div>
                    <div class="w-1/3">{{$salary->sum}}</div>
                    <div class="w-1/3">{{$salary->comment}}</div>
                </x-blocks.btn-accordion>
                <x-blocks.content-accordion>
                    <div class="mr-2 text-xs text-gray-600 leading-relaxed">
                        {{__('Created')}} {{$salary->created_at}}
                        {{__('Updated')}} {{$salary->updated_at}}
                        {{__('Owner')}} {{$salary->owner->name}}
                        {{__('Driver')}} {{$salary->driver->name}}
                    </div>
                    <div class="flex">
                        <x-blocks.btn-edit wire:click="edit({{ $salary->id }})" />
                        <x-blocks.btn-delete wire:click="confirmDelete({{ $salary->id }})" />
                    </div>
                </x-blocks.content-accordion>
            </x-blocks.accordion>
            @endforeach
            {{$salaries->links()}}
        </x-slot>
    </x-blocks.list>

    @include('components.blocks.salary-form')

    @include('components.blocks.confirming-deletion')

</div>