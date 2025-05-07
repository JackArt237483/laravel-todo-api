<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
        return response()->json(Task::all());
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string|in:pending,completed'
        ]);

        $task = Task::create($validated);
        return response()->json($task, 201);
    }

    public function show($id) {
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    public function update(Request $request, $id) {
        $task = Task::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string|in:pending,completed'
        ]);

        $task->update($validated);
        return response()->json($task);
    }

    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }
}
