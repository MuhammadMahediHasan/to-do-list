<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\Todo;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tasks = Task::query()
            ->with('todo')
            ->get();

        return view('task.index',
            compact('tasks')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $todos = Todo::query()
            ->pluck('name as text', 'id')
            ->all();
        return view('task.create',
            compact('todos')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request): RedirectResponse
    {
        $todoList = new Task();
        $todoList->fill(
            $request->validated()
        )->save();

        return Redirect::route('task.index')->with('success', 'Task created successfully');
    }

    /**
     * Show the specified resource information.
     */
    public function show(string $id): View
    {
        $task = Task::query()->findOrFail($id);
        $todos = Todo::query()
            ->pluck('name as text', 'id')
            ->all();

        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $task = Task::query()->findOrFail($id);
        $todos = Todo::query()
            ->pluck('name as text', 'id')
            ->all();

        return view('task.edit', compact('task', 'todos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id): RedirectResponse
    {
        $todoList = Task::query()->findOrFail($id);
        $todoList->update($request->validated());

        return Redirect::route('task.index')->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $todoList = Task::query()->findOrFail($id);
        $todoList->delete();

        return Redirect::route('task.index')->with('success', 'Task deleted successfully');
    }
}
