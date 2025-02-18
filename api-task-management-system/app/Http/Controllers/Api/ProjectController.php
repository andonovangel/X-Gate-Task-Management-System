<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request){
        $query = Project::query();

        if ($request->has('overdue')) {
            $query->where('due_date', ($request->overdue == 'true') ? '<' : '>', Carbon::now());
        }

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('due_date', [$request->start_date, $request->end_date]);
        }

        return response()->json($query->get(), 200);
    }

    public function store(Request $request)
    {
        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'due_date' => $request->due_date,
        ]);

        return response()->json($project, 201);
    }
}
