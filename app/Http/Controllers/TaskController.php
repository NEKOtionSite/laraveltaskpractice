<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use App\Models\Task;
use Illuminate\View\View;
 
class TaskController extends Controller
{
 
    public function index(): View
    {
        $tasks = Task::all();
        return view ('tasks.index')->with('tasks', $tasks);
    }
 
    public function create(): View
    {
        return view('tasks.create');
    }
 
  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Task::create($input);
        return redirect('task')->with('flash_message', 'Task Addedd!');
    }
 
    public function show(string $id): View
    {
        $task = Task::find($id);
        return view('tasks.show')->with('tasks', $task);
    }
 
    public function edit(string $id): View
    {
        $task = Task::find($id);
        return view('tasks.edit')->with('tasks', $task);
    }
 
    public function update(Request $request, string $id): RedirectResponse
    {
        $task = Task::find($id);
        $input = $request->all();
        $task->update($input);
        return redirect('task')->with('flash_message', 'task Updated!');  
    }
 
    
    public function destroy(string $id): RedirectResponse
    {
        Task::destroy($id);
        return redirect('task')->with('flash_message', 'Task deleted!');
   
    }  
}