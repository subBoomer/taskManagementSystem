<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);

        // Create a new task instance
        $task = new Task();
        $task->title = $validatedData['title'];
        // Set other task attributes based on the form fields
        
        // Associate the task with the selected category
        $category = Category::find($request->category_id);
        $task->category()->associate($category);

        // Save the task
        $task->save();

        // Redirect to a relevant route after task creation
        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function edit(Task $task)
    {
        $task = Task::findOrFail($id);
        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(Request $request, Task $task)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);

        // Update the task attributes
        $task->title = $validatedData['title'];
        // Update other task attributes based on the form fields
        
        // Associate the task with the selected category
        $category = Category::find($request->category_id);
        $task->category()->associate($category);

        // Save the updated task
        $task->save();

        // Redirect to a relevant route after task update
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
                         ->with('success', 'Task deleted successfully');
    }

    public function show($id)
{
    $task = Task::findOrFail($id);
    $category = $task->category;
    
    return view('tasks.show', compact('task', 'category'));
}
}
