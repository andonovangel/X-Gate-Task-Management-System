@extends('welcome')

@section('content')
    <h2 class="text-2xl font-bold py-4">Categories</h2>

    <a href="{{ route('categories.create') }}" class="text-white bg-blue-500 p-2 rounded">Create New Category</a>

    <div class="mt-4">
        <ul>
            @foreach($categories as $category)
                <li class="border-b py-2">
                    <a class="text-blue-600">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
