<!-- edit.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Edit Task</h1>
    
    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $task->title }}">
        
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($task->category_id == $category->id) selected @endif>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        
        <!-- Other form fields pre-filled with existing task data -->

        <button type="submit">Update Task</button>
    </form>
@endsection
