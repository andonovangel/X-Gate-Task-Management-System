<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query();

        if ($request->has('overdue')) {
            $query->where('due_date', ($request->overdue == 'true') ? '<' : '>', Carbon::now());
        }

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('due_date', [$request->start_date, $request->end_date]);
        }

        $projects = $query->get();

        return view('projects.index', compact('projects'));
    }


    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'due_date' => $request->due_date,
        ]);
        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }
}
