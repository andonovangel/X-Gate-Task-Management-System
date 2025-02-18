<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->has('by_category')) {
            $query->where('category_id', $request->by_category);
        }

        if ($request->has('by_status')) {
            $query->where('status', $request->by_status);
        }
        return response()->json($query->get(), 200);
    }

    public function store(Request $request)
    {
        $task = Task::create([
            'name' => $request->name,
            'project_id' => $request->project_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return response()->json($task, 201);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->update($request->only(['status']));
        return response()->json($task, 200);
    }
}
