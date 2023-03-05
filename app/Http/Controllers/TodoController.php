<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $todos = Todo::query()
            ->with('tasks')
            ->get();

        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request): RedirectResponse
    {
        $todoList = new Todo();
        $todoList->fill(
            $request->validated() + ['user_id' => Auth::id()]
        )->save();

        return Redirect::route('todo.index')->with('success', 'Todo created successfully');
    }

    /**
     * Show the specified resource information.
     */
    public function show(string $id): View
    {
        $todo = Todo::query()->findOrFail($id);

        return view('todo.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $todo = Todo::query()->findOrFail($id);

        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoRequest $request, string $id): RedirectResponse
    {
        $todoList = Todo::query()->findOrFail($id);
        $todoList->update($request->validated());

        return Redirect::route('todo.index')->with('success', 'Todo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $todoList = Todo::query()->findOrFail($id);
        $todoList->delete();

        return Redirect::route('todo.index')->with('success', 'Todo deleted successfully');
    }
}
