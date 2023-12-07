<!-- index.blade.php -->
@extends('layouts.app')

@section('content')
<h1>List of Tasks</h1>
    <a href="{{ route('tasks.create') }}">Create Task</a>

    <ul>
        @foreach($tasks as $task)
            <li>
                {{ $task->title }}
                @if ($task->category)
                    (Category: {{ $task->category->name }})
                @endif
                <a href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit Task</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
