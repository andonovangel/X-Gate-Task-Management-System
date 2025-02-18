@extends('welcome')

@section('content')
    <h2 class="text-2xl font-bold py-4">Create New Project</h2>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="name" class="block text-sm font-semibold text-gray-700">Project Name</label>
            <input type="text" id="name" name="name" class="mt-1 block w-full border-2 border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm">
        </div>

        <div class="mb-6">
            <label for="description" class="block text-sm font-semibold text-gray-700">Project Description</label>
            <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-2 border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm"></textarea>
        </div>

        <div class="mb-6">
            <label for="due_date" class="block text-sm font-semibold text-gray-700">Due Date</label>
            <input type="date" id="due_date" name="due_date" class="mt-1 block w-full border-2 border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm">
        </div>

        <button type="submit" class="bg-blue-600 text-white p-3 rounded-md hover:bg-blue-700 transition duration-200">Create Project</button>
    </form>
@endsection
