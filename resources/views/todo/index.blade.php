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
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead>
                        <tr>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">SL</th>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Name</th>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Created At</th>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Action</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach ($toDoLists as $list)
                            <tr>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $loop->iteration }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $list->name }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $list->created_at }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400 flex">
                                    <a href="{{ route('todo.edit', $list->id) }}"
                                       class="border border-yellow-500 hover:bg-yellow-500 hover:text-white px-4 py-2 rounded-md">EDIT</a>
                                    <form method="post" action="{{ route('todo.destroy', $list->id) }}" class="inline">
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
