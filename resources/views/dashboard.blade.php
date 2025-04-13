<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <div class="bg-white py-24 sm:py-32">
                        <div class="mx-auto max-w-7xl px-6 lg:px-8">
                            <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                                    <dt class="text-base/7 text-gray-600">Total Tasks</dt>
                                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                                        {{$totalTasks}}</dd>
                                </div>
                                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                                    <dt class="text-base/7 text-gray-600">Completed Tasks</dt>
                                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ $completedTasks }}</dd>
                                </div>
                                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                                    <dt class="text-base/7 text-gray-600">Pending Tasks</dt>
                                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                                        {{$pendingTasks}}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
