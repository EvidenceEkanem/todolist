<?php

namespace evidenceekanem\todolist\Controllers;

use Illuminate\Http\Request;
use evidenceekanem\todolist\Controller;
use evidenceekanem\todolist\Models\Category;
use evidenceekanem\todolist\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        if ($request->get('category')) {
            $currentCat = $request->get('category');
            $currentCat = Category::where('id', $currentCat)->first();
            $tasksForCurrentCat = $currentCat->tasks ?? null;
        }
        return view('todolist::tasks', ['categories' => $categories, 'tasks' => $tasksForCurrentCat ?? null, 'current_cat' => $currentCat ?? null]);
    }

    public function addCategory(Request $request)
    {
        $categories = new Category;
        $categories->categories = $request->categories;
        $categories->save();

        $url = route('tasks.index').'?category=' . $categories->id;
        return redirect($url);
    }
   

    public function addTask(Request $request)
    {
        $tasks = new Task;
        $tasks->name = $request->name;
        $tasks->category_id = $request->category_id;
        $tasks->save();
        
        return back();
    }

   
    public function updateCat(Request $request, $id)
    {
        $categories = Category::findOrFail($id);
        $categories->categories = $request->categories;
        
        $categories->save();

        return back();
    }

    public function updateTask(Request $request, $id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->name = $request->tasks;
        $tasks->save();

        return back();
    }


    public function deleteTask($id)
    {
        $tasks = Task::Find($id);
        $tasks->delete();
        
        return back();
    }

    public function deleteCategory($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        
        return back();
    }

    public function updateTaskStatus(Request $request)
    {
        $task = Task::findOrFail($request->taskId);
        
        if($task->completed == false)
        {
            $task->completed = true;
            $task->save();
        }
        else{
            $task->completed = 0;
            $task->save();
        }

        return $task;
    }
}
