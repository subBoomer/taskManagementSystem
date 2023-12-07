<!-- create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create Task</h1>
    
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title">
        
        <!-- Other form fields for description, due date, etc. -->

        <button type="submit">Create Task</button>
    </form>
@endsection
