<?php

namespace Tests\Unit;

use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TodoModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_creation(): void
    {
        $task = Todo::factory()->create();

        $this->assertDatabaseHas('todos', [
            'user_id' => $task->user_id,
            'task' => $task->task,
            'check' => $task->check,
            'priority' => $task->priority
        ]);
    }
}
