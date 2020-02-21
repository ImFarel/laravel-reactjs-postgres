<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required'
        ]);

        $task = Task::create([
            'title' => $validateData['title'],
            'project_id' => $request->id,
        ]);
    }

    public function markAsComplete(Task $task)
    {
        $task->is_completed = true;
        $task->update();

        return \response()->json('Task updated');
    }
}
