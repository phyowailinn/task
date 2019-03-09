@extends('layouts.app')

@section('content')

<section class="content-header">
  <h1>Tasks</h1>  
    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tasks</li>
    </ol>
</section>
   
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
          <div class="box-header">
            <a class="btn btn-primary" style="margin-top: 0px;margin-bottom: 5px" href="{{ route('tasks.get') }}">Add New</a>
          </div>
          <div class="box-body table-responsive">
              <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Task Type</th>
                    <th>Company</th>
                    <th>Contant</th>
                    <th>Subject/Object</th>
                    <th>Assigned To</th>
                    <th>Due Date</th>
                    <th>Set Reminder</th>
                    <th>Priority</th>
                    <th>Created At</th>
                    <th>Create By</th>
                    <th width="7%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(isset($tasks))
                  @foreach($tasks as $task)
                  <tr>
                    <td>{{$task->task_type}}</td>
                    <td>{{$task->company}}</td>
                    <td>{{$task->contact_by->name}}</td>
                    <td>{{$task->subject}}</td>
                    <td>{{$task->assigned->name}}</td>
                    <td>{{$task->due_day}} {{$task->due_time}}</td>
                    <td>{{$task->reminder_day}} {{$task->reminder_time}}</td>
                    <td>
                      <span class="label label-{{$task->status}}">
                        {{$task->priority_type}}
                      </span>
                    </td>
                    <td>{{$task->created}}</td>
                    <td>{{$task->creator->name}}</td>
                    <td>
                      {!! Form::open(['route' => ['tasks.destroy', $task->task_id], 'method' => 'delete']) !!}
                      <div class='btn-group'>
                        <a href="{{route('tasks.get',$task->task_id)}}" class='btn btn-primary btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-remove"></i>',['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}                        
                      </div>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
          </div>
        </div>
    </div>
@endsection

