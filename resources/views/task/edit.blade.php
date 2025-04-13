<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="isolate px-6 py-24 sm:py-32 lg:px-8">
                        <form action="{{route('tasks.update', $task->getKey())}}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
                            <input type="hidden" name="_method" value="PUT">
                            @include('task.partial.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
