<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::all();
        $categories = Category::all();

        $query = Task::query();

        if ($request->filled('by_category')) {
            $query->where('category_id', $request->by_category);
        }

        if ($request->has('by_status')) {
            $query->where('status', $request->by_status);
        }

        $tasks = $query->get();

        return view('tasks.index', compact('tasks', 'categories'));
    }

    public function create()
    {
        $projects = Project::all();
        $categories = Category::all();
        return view('tasks.create', compact('projects', 'categories'));
    }

    public function store(Request $request)
    {
        Task::create([
            'title' => $request->title,
            'description' => $request->description ?? null,
            'project_id' => $request->project_id,
            'category_id' => $request->category_id,
            'due_date' => $request->due_date,
            'status' => false, // Set the status to false by default
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->status = !$task->status;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task status updated successfully!');

    }
}
