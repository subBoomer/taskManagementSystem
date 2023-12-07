<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate();

        Task::create($request->all());

        return redirect()->route('tasks.index')
                         ->with('success', 'Task created successfully');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        // Validation can be added here using $request->validate()

        $task->update($request->all());

        return redirect()->route('tasks.index')
                         ->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
                         ->with('success', 'Task deleted successfully');
    }
}
