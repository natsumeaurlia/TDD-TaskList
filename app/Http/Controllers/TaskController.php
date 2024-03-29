<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks  = Task::all();

        return view('index', compact('tasks'));
    }

    public function show($id)
    {
        $task = Task::find($id);
        if ($task === null)
            abort(404);
        return view('show', compact('task'));
    }

    public function update($id, Request $request)
    {
        $task = Task::find($id);
        if ($task === null) {
            abort(404);
        }
        $request->validate(['title' => 'required|max:255']);
        $task->fill($request->all())->save();

        return redirect()->route('task.show', ['id' => $id]);
    }

    public function add()
    {
        return view('add');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:512',
        ]);

        Task::create(['title' => $request->title, 'executed' => false]);

        return redirect('/tasks');
    }

    public function delete($id)
    {
        if ($id)
            Task::destroy($id);
        return redirect()->route('task.index');
    }
}
