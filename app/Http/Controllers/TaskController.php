<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('index', ['tasks' => $tasks]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        Task::create(['name' => $request->name, 'description' => $request->description]);
        return redirect()->route('task.index')->with('success', 'Task successfully added.');
    }

    public function edit($id)
    {
        $tasks = Task::findOrFail($id);
        return view('edit', ['tasks' => $tasks]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pending,completed'
        ]);

        $tasks = Task::findOrFail($id);
        $tasks->update($request->all());

        return redirect()->route('task.index')->with('success', 'Task successfully updated');
    }

    public function destroy($id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->delete();
        return redirect()->route('task.index')->with('success', 'Task successfully deleted.');
    }
}
