<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\boardTask;
use App\Http\Resources\V1\TaskResource;

class TaskController extends Controller
{
    public function index()
    {
        return TaskResource::Collection(boardTask::all());
    }

    public function show(BoardTask $task)
    {
        return new TaskResource($task);
    }

    public function store(TaskRequest $request)
    {
        boardTask::create($request->validated());
        return response()->json("Task created.");
    }

    public function update(TaskRequest $request, boardTask $task)
    {
        $task->update($request->validated());
        return response()->json("Task updated.");
    }

    public function destroy(boardTask $task)
    {
        $task->delete();
        return response()->json("Task deleted");
    }
}
