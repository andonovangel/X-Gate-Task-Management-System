@extends('welcome')

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="title" class="block text-sm font-semibold text-gray-700">Task Title</label>
            <input type="text" id="title" name="title" class="mt-1 block w-full border-2 border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm">
        </div>

        <div class="mb-6">
            <label for="project_id" class="block text-sm font-semibold text-gray-700">Project</label>
            <select id="project_id" name="project_id" class="mt-1 block w-full border-2 border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm">
                @foreach($projects as $project) <!-- Updated variable to $projects -->
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="category_id" class="block text-sm font-semibold text-gray-700">Category</label>
            <select id="category_id" name="category_id" class="mt-1 block w-full border-2 border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="description" class="block text-sm font-semibold text-gray-700">Description</label>
            <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-2 border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm"></textarea>
        </div>

        <div class="mb-6">
            <label for="due_date" class="block text-sm font-semibold text-gray-700">Due Date</label>
            <input type="date" id="due_date" name="due_date" class="mt-1 block w-full border-2 border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm">
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-md hover:bg-blue-700 transition duration-200">Create Task</button>
    </form>
@endsection
