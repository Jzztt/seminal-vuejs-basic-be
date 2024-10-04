<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json(['tasks' => $tasks, 'message' => 'Get all tasks success', 'success' => true], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|string|in:to-do,in-progress,done',
        ]);

        $task = Task::create($request->all());
        return response()->json(['task' => $task, 'message' => 'Task created', 'success' => true], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        if ($task) {
            return response()->json(['task' => $task, 'success' => true], 200);
        }
        return response()->json(['message' => 'Task not found', 'success' => false], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required|string|in:to-do,in-progress,done',
        ]);

        $task = Task::find($id);
        if ($task) {
            $task->update($request->all());
            return response()->json(['task' => $task, 'message' => 'Task updated', 'success' => true], 200);
        }
        return response()->json(['message' => 'Task not found', 'success' => false], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return response()->json(['task' => $task,  'message' => 'Task deleted', 'success' => true], 200);
        }
        return response()->json(['message' => 'Task not found', 'success' => false], 404);
    }


    // Phân Trang
    // public function fetchTasks(Request $request)
    // {
    //     $perPage = $request->get('perPage', 10);
    //     $tasks = Task::paginate($perPage);
    //     return response()->json(['tasks' => $tasks, 'success' => true], 200);
    // }
}
