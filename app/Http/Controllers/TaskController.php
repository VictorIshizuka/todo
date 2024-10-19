<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $r) {}
    public function update(Request $r)
    {
        $task = Task::findOrFail($r->taskId);

        $task->is_done = $r->status;
        $task->save();
        return ['success' => true];
    }
    public function create(Request $r)
    {
        $categories = Category::all();
        $list = [];
        $list['categories'] = $categories;
        return view('tasks.create', $list);
    }

    public function create_action(Request $request)
    {
        $reqTask = $request->only(['title', 'description', 'due_date', 'category_id']);
        $reqTask['user_id'] = 1;
        Task::create($reqTask);
        // $createTask->save();
        return redirect(route('home'));
    }

    public function edit(Request $r)
    {
        $id = $r->id;
        $task = Task::find($id);
        if (!$task) {
            return redirect(route('home'));
        }
        $categories = Category::all();
        $data = [];
        $data['categories'] = $categories;
        $data['task'] = $task;
        return view('tasks.edit', $data);
    }

    public function edit_action(Request $r)
    {
        $id  = $r->id;
        $requestTask  = $r->only(['title', 'due_date', 'category_id', 'description']);
        $requestTask["is_done"] = $r->is_done ? true : false;
        $task = Task::find($id);
        if (!$task) {
            return 'esta task nao existe!';
        }

        $task->update($requestTask);
        $task->save();
        return redirect(route('home'));
    }

    public function delete_action(Request $r)
    {
        $id  = $r->id;
        $task = Task::find($id);
        if (!$task) {
            return redirect(route('home'))->with('error', 'Esta task não existe!');
        }

        $task->delete();
        return redirect(route('home'))->with('success', 'Task deletada com sucesso!');
    }
}
