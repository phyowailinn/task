<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use Flash;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = Task::all();
        return view('admin.tasks',compact('tasks'));
    }

    public function getTask($id=0)
    {
        $task = Task::find($id);
        $types = config('constants.types');
        $priorities = config('constants.priorities');
        $user_lists = User::pluck('name','id');

        return view('admin.action_task',compact('task','priorities','user_lists','types'));
    }

    public function store(Request $request)
    {  
        $rule = [
            'task_type' => 'required|integer',
            'company' => 'required',
            'contact' => 'required|integer',
            'subject' => 'required',
            'assigned_to' => 'required|integer',
            'due_date' => 'required|date',
            'priority' => 'required|integer'
        ];

        if ($request->reminder_date) {
            $rule['reminder_date'] = 'date';
        }

        $this->validate($request,$rule);

        $task = new Task;
        $task->type = $request->task_type;
        $task->company = $request->company;
        $task->contact = $request->contact;
        $task->subject = $request->subject;
        $task->assigned_to = $request->assigned_to;
        $task->due_date = date('Y-m-d H:i:s',strtotime($request->due_date.' '.$request->due_time));
        $task->reminder = ($request->reminder_date)?date('Y-m-d H:i:s',strtotime($request->reminder_date.' '.$request->reminder_time)):null;
        $task->priority = $request->priority;
        $task->created_by = auth()->id();
        $task->save();

        Flash::success('Succefully saving');
        return redirect()->route('tasks.index');
    }

    public function update(Request $request,$id)
    {         
        $rule = [
            'task_type' => 'required|integer',
            'company' => 'required',
            'contact' => 'required|integer',
            'subject' => 'required',
            'assigned_to' => 'required|integer',
            'due_date' => 'required|date',
            'priority' => 'required|integer'
        ];

        if ($request->reminder_date) {
            $rule['reminder_date'] = 'date';
        }

        $this->validate($request,$rule);

        $task = Task::find($id);
        if (auth()->user()->can('update', $task)) {
            $task->update([
                'type' => $request->task_type,
                'company' => $request->company,
                'contact' => $request->contact,
                'subject' => $request->subject,
                'assigned_to' => $request->assigned_to,
                'due_date' => date('Y-m-d H:i:s',strtotime($request->due_date.' '.$request->due_time)),
                'reminder' => ($request->reminder_date)?date('Y-m-d H:i:s',strtotime($request->reminder_date.' '.$request->reminder_time)):null,
                'priority' => $request->priority,
                'updated_by' => auth()->id()
            ]);
            
            Flash::success('Succefully saving');
            return redirect()->route('tasks.index');
        }

        Flash::error('Your don`t have permission to edit!');
        return back();        
    }

    public function destroy($id)
    {
        Task::destroy($id);
        Flash::success('Succefully deleting');
        return back();
    }

    public function indexUser(){
        $users = User::all();
        return view('admin.user',compact('users'));
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        Flash::success('Succefully deleting');
        return back();
    }
}
