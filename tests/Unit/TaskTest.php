<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Task;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory as Faker;

class TaskTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetTaskDetailNotExists()
    {
        $tasks = Task::find(0);
        $this->assertNull($tasks);
    }

    public function testUpdateTask()
    {
        $task = Task::create([
            'title' => 'test',
            'executed' => false,
        ]);

        $this->assertEquals('test', $task->title);
        $this->assertFalse($task->executed);

        $task->fill(['title' => 'テスト']);
        $task->save();

        $task2 = Task::find($task->id);
        $this->assertEquals('テスト', $task2->title);
    }
}
