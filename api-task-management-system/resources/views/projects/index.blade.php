@extends('welcome')

@section('content')
    <h2 class="text-2xl font-bold py-4">Projects</h2>
    <a href="{{ route('projects.create') }}" class="text-white bg-blue-500 p-2 rounded">Create New Project</a>

    <div class="mt-4">
        <form action="{{ route('projects.index') }}" method="GET">
            <select name="overdue" class="p-2 border rounded">
                <option value="">All Projects</option>
                <option value="true" {{ request('overdue') == 'true' ? 'selected' : '' }}>Overdue Projects</option>
                <option value="false" {{ request('overdue') == 'false' ? 'selected' : '' }}>Upcoming Projects</option>
            </select>

            <input type="date" name="start_date" value="{{ request('start_date') }}" class="p-2 border rounded">
            <input type="date" name="end_date" value="{{ request('end_date') }}" class="p-2 border rounded">

            <button type="submit" class="ml-2 bg-blue-500 text-white p-2 rounded">Filter</button>
        </form>
    </div>

    <div class="mt-4">
        <ul>
            @foreach($projects as $project)
                <li class="border-b py-4">
                    <div class="flex items-center justify-between">
                        <div class="text-lg font-semibold">
                            <a class="text-blue-600">{{ $project->name }}</a>
                            | <p class="text-sm text-gray-500">{{ $project->due_date }}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
