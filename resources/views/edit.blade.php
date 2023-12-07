<!-- edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>
    
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $task->title }}">
        
        <!-- Other form fields pre-filled with existing task data -->

        <button type="submit">Update Task</button>
    </form>
@endsection
