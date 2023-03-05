<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todo Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ $todo->name }}
                            </h2>

                            <ul class="pl-4 {{ $todo->tasks->count() ? 'list-disc' : 'list-none' }}">
                                @forelse($todo->tasks as $task)
                                <li>
                                    <p class="mt-1 text-sm text-gray-600">
                                        {{ $task->name }}
                                    </p>
                                </li>
                                @empty
                                    <li>
                                        <p class="mt-1 text-sm text-gray-600">
                                            {{ __("No task found.") }}
                                        </p>
                                    </li>
                                @endforelse
                            </ul>
                        </header>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
