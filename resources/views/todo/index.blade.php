<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Todo List') }}
            </h2>

            <x-primary-link :href="route('todo.create')">{{ __('Create Todo') }}</x-primary-link>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-alert></x-alert>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-l">
                    <table class="border-collapse w-full text-sm">
                        <thead>
                        <tr>
                            <th class="border font-medium p-4 text-slate-400 text-left">SL</th>
                            <th class="border font-medium p-4 text-slate-400 text-left">Name</th>
                            <th class="border font-medium p-4 text-slate-400 text-left">Tasks Name</th>
                            <th class="border font-medium p-4 text-slate-400 text-left">Created At</th>
                            <th class="border font-medium p-4 text-slate-400 text-left">Action</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach ($todos as $todo)
                            <tr>
                                <td class="border p-4 text-slate-500 dark:text-slate-400">{{ $loop->iteration }}</td>
                                <td class="border p-4 text-slate-500 dark:text-slate-400">{{ $todo->name }}</td>
                                <td class="border p-4 text-slate-500 dark:text-slate-400">
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
                                </td>
                                <td class="border p-4 text-slate-500 dark:text-slate-400">{{ $todo->created_at }}</td>
                                <td class="border p-4 text-slate-500 dark:text-slate-400">
                                    <a href="{{ route('todo.edit', $todo->id) }}"
                                       class="border border-indigo-500 hover:bg-indigo-500 hover:text-white px-4 py-2 rounded-md">
                                        EDIT
                                    </a>
                                    <a href="{{ route('todo.show', $todo->id) }}"
                                       class="border border-blue-500 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md">
                                        SHOW
                                    </a>
                                    <form method="post" action="{{ route('todo.destroy', $todo->id) }}"
                                          class="inline">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="border border-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-md">
                                            DELETE
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
