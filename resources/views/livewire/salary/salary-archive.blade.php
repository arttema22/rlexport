<div class="max-w-6xl mx-auto my-4 p-4 overflow-hidden border sm:rounded-lg">
    <x-blocks.list>
        <x-slot name="title">
            <x-blocks.title>
                {{__('Archive')}}
            </x-blocks.title>
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
                    <div class="text-xs text-gray-600 leading-relaxed">
                        {{__('Created')}} {{$salary->created_at}}
                        {{__('Updated')}} {{$salary->updated_at}}
                        {{__('Owner')}} {{$salary->owner->name}}
                        {{__('Driver')}} {{$salary->driver->name}}
                    </div>
                </x-blocks.content-accordion>
            </x-blocks.accordion>
            @endforeach
        </x-slot>
    </x-blocks.list>
</div>
