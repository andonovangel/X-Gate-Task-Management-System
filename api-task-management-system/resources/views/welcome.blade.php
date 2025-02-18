<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X Gate Task Management App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto">
        <header class="py-4">
            <h1 class="text-xl font-bold">X Gate Task Management App</h1>
            <nav>
                <a href="{{ route('projects.index') }}" class="text-blue-500">Projects</a>
                <a href="{{ route('categories.index') }}" class="ml-4 text-blue-500">Categories</a>
                <a href="{{ route('tasks.index') }}" class="ml-4 text-blue-500">Tasks</a>
            </nav>
        </header>

        @yield('content')
    </div>
</body>
</html>
