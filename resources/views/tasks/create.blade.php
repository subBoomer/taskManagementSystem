<!-- create.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Create Task</h1>
    
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title">
        
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        
        <!-- Other form fields for description, due date, etc. -->

        <button type="submit">Create Task</button>
    </form>
@endsection
