<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'task' => 'required|min:3|max:255',
            'priority' => 'required|integer|between:1,3',
        ]);

        $validated['user_id'] = auth()->id();

        try {
            Todo::create($validated);
            return redirect()->route('home')->with('success', 'Task added successfully!');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Failed to add task.' . $e->getMessage());
        }
    }

    public function destroy(Todo $id)
    {
        $id->delete();

        return redirect()->route('home')->with('success', 'Task deleted successfully!');
    }

    public function edit($id)
    {
        $editing = true;
        $tasks = Todo::orderBy('priority', 'DESC')->get();
        $taskBeingEdited = Todo::findOrFail($id);

        return view('home', compact('editing', 'tasks', 'taskBeingEdited'));
    }

    public function update(Todo $id, Request $request)
    {
        $validated = $request->validate([
            'task' => 'required|min:3|max:255',
            'priority' => 'required|integer|between:1,3',
        ]);

        try {
            $id->update($validated);
            return redirect()->route('home')->with('success', 'Task successfully edited!');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Failed to edit task.' . $e->getMessage());
        }
    }

    public function check($id)
    {
        try {
            $todo = Todo::findOrFail($id);
            $todo->check = !$todo->check;
            $todo->save();

            if ($todo->check) {
                return redirect()->route('home')->with('success', 'Well Done!');
            } else {
                return redirect()->route('home')->with('error', 'Failed to complete task.');
            }
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
