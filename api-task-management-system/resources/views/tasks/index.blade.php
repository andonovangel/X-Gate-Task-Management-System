@extends('welcome')

@section('content')
    <div class="mt-4">
        <a href="{{ route('tasks.create') }}" class="text-white bg-green-500 p-2 rounded">Create New Task</a>
    </div>

    <div class="mt-4">
        <form action="{{ route('tasks.index') }}" method="GET" class="flex space-x-4">
            <select name="by_category" class="p-2 border rounded">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('by_category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <select name="by_status" class="p-2 border rounded">
                <option value="">All Tasks</option>
                <option value="1" {{ request('by_status') == 'true' ? 'selected' : '' }}>Completed</option>
                <option value="0" {{ request('by_status') == 'false' ? 'selected' : '' }}>Pending</option>
            </select>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Filter</button>
        </form>
    </div>

    <div class="mt-4">
        <ul>
            @foreach($tasks as $task)
                <li class="border-b py-2 {{ $task->status ? 'bg-green-100 line-through' : '' }}">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="flex items-center space-x-2">
                        @csrf
                        @method('PATCH')

                        <input
                            type="checkbox"
                            name="status"
                            id="status_{{ $task->id }}"
                            class="form-checkbox"
                            {{ $task->status ? 'checked' : '' }}
                            onchange="this.form.submit()" />

                        <label for="status_{{ $task->id }}" class="text-blue-600">{{ $task->title }}</label>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
