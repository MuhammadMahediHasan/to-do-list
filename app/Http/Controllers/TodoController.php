<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoListRequest;
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
        $toDoLists = Todo::query()->get();

        return view('todo.index', compact('toDoLists'));
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
    public function store(TodoListRequest $request): RedirectResponse
    {
        $todoList = new Todo();
        $todoList->fill(
            $request->validated() + ['user_id' => Auth::id()]
        )->save();

        return Redirect::route('todo.index')->with('success', 'Todo created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $todoList = Todo::query()->findOrFail($id);

        return view('todo.edit', compact('todoList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoListRequest $request, string $id): RedirectResponse
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
