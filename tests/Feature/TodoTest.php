<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TodoTest extends TestCase
{
    public function test_a_todo_requires_a_name()
    {
        $this->actingAs(User::factory()->create());
        $todo = Todo::factory()->make(['name' => null]);
        $this->post(route('todo.store'), $todo->toArray())->assertSessionHasErrors('name');
    }

    public function test_a_authorized_user_can_create_a_todo()
    {
        $this->actingAs(User::factory()->create());
        $todo = Todo::factory()->make();
        $this->post(route('todo.store'), $todo->toArray());
        $this->assertEquals(1, Todo::all()->count());
    }

    public function test_a_authorized_user_can_update_the_todo()
    {
        $this->actingAs(User::factory()->create());
        $todo = Todo::factory()->create(['user_id' => Auth::id()]);
        $todo->name = "Updated name";
        $this->put(route('todo.update', $todo->id), $todo->toArray());
        $this->assertDatabaseHas('todos', ['id' => $todo->id, 'name' => 'Updated Name']);
    }

    public function test_a_authorized_user_can_view_list_page()
    {
        $this->actingAs(User::factory()->create());
        Todo::factory()->count(10)->create();
        $response = $this->get(route('todo.index'));
        $response->assertViewHas('todos');
    }

    public function test_a_authorized_user_can_view_single_todo()
    {
        $this->actingAs(User::factory()->create());
        $todo = Todo::factory()->create(['user_id' => Auth::id()]);
        $response = $this->get(route('todo.show', $todo->id));
        $response->assertSee($todo->name);
    }

    public function test_a_authorized_user_can_delete_the_todo()
    {
        $this->actingAs(User::factory()->create());
        $todo = Todo::factory()->create(['user_id' => Auth::id()]);
        $this->delete(route('todo.update', $todo->id));
        $this->assertDatabaseMissing('todos', ['id' => $todo->id]);
    }
}
