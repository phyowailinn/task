@extends('layouts.app')

@section('content')

<section class="content-header">
  <h1>Tasks</h1>  
    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('tasks.index')}}"> Tasks</a></li>
        <li class="active"><a href="#">{{ __(isset($task)?'Edit':'Add')}}</a></li>
    </ol>
</section>
   
<section class="content">


          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ isset($task) ? route('tasks.update',$task->task_id) : route('tasks.store') }}">
                @if(isset($task)) @method('PUT') @endif
                @csrf
            <div class="box-body">              
              <div class="form-group row col-md-12">
                    <label class="col-md-3">Task Type :</label>
                    <div class="col-md-6 required-red">
                        <select name="task_type" class="form-control" required>
                            <option value="">Select a Task Type</option>
                            @foreach($types as $key=>$value)
                                <option {{isset($task) && $task->type == $key ? 'selected' : '' }} value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('task_type'))
                            <strong class="text-danger">{{ $errors->first('task_type') }}</strong>
                        @endif
                    </div>                       
                </div>
                <div class="form-group row col-md-12">
                    <label class="col-md-3">Company :</label>
                    <div class="col-md-6 required-red">
                        <input type="text" class="form-control" name="company" required="required" autofocus="autofocus" value="{{isset($task)?$task->company:null}}">
                        @if ($errors->has('company'))
                            <strong class="text-danger">{{ $errors->first('company') }}</strong>
                        @endif
                    </div>                       
                </div>
                <div class="form-group row col-md-12">
                    <label class="col-md-3">Contact :</label>
                    <div class="col-md-6 required-red">
                        <select name="contact" class="form-control" required>
                            <option value="">Select a Contact</option>
                            @foreach($user_lists as $key=>$value)
                                <option {{isset($task) && $task->contact == $key ? 'selected' : '' }} value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('contact'))
                            <strong class="text-danger">{{ $errors->first('contact') }}</strong>
                        @endif
                    </div>                       
                </div>
                <div class="form-group row col-md-12">
                    <label class="col-md-3 ">Subject/Object :</label>
                    <div class="col-md-6 required-red">
                        <input type="text" class="form-control" name="subject" required="required" autofocus="autofocus" value="{{isset($task)?$task->subject:null}}">
                        @if ($errors->has('subject'))
                            <strong class="text-danger">{{ $errors->first('subject') }}</strong>
                        @endif
                    </div>                       
                </div>
                <div class="form-group row col-md-12">
                    <label class="col-md-3">Assigned To :</label>
                    <div class="col-md-6 required-red">
                        <select name="assigned_to" class="form-control" required>
                            <option value="">Select a Assignee</option>
                            @foreach($user_lists as $key=>$value)
                                <option {{isset($task) && $task->assigned_to == $key ? 'selected' : '' }} value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('assigned_to'))
                            <strong class="text-danger">{{ $errors->first('assigned_to') }}</strong>
                        @endif
                    </div>                       
                </div>
                <div class="form-group row col-md-12">
                    <label  class="col-md-3">Due Date :</label>
                    <div class="col-md-3 required-red">
                        <div class="input-group">
                          <input type="text" class="form-control datetpicker" name="due_date" required="required" autofocus="autofocus" value="{{isset($task)?date('m/d/Y',strtotime($task->due_date)):null}}">
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                          @if ($errors->has('due_date'))
                              <strong class="text-danger">{{ $errors->first('due_date') }}</strong>
                          @endif
                        </div>
                    </div> 
                    <div class="col-md-3 required-white floot_top">
                        <div class="input-group">
                          <input type="text"class="form-control timetpicker" name="due_time" autofocus="autofocus" value="{{isset($task)&&date('H:i',strtotime($task->due_date))!=0?date('H:i',strtotime($task->due_date)):null}}">
                          <span class="input-group-addon">
                              <span class="fa fa-clock-o"></span>
                          </span>
                          @if ($errors->has('due_time'))
                              <strong class="text-danger">{{ $errors->first('due_time') }}</strong>
                          @endif
                        </div>
                    </div>                         
                </div>

                <div class="form-group row col-md-12">
                    <label class="col-md-3">Set Reminder :</label>
                    <div class="col-md-3 required-white">
                        <div class="input-group">
                          <input type="text"  class="form-control datetpicker" name="reminder_date" autofocus="autofocus" value="{{isset($task) && $task->reminder?date('m/d/Y',strtotime($task->reminder)):null}}">
                           <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                    </div> 

                    <div class="col-md-3 required-white floot_top">
                        <div class="input-group">
                          <input type="text"class="form-control timetpicker" name="reminder_time" autofocus="autofocus" value="{{isset($task) && $task->reminder&&date('H:i',strtotime($task->reminder))!=0?date('H:i',strtotime($task->reminder)):null}}">
                          <span class="input-group-addon">
                              <span class="fa fa-clock-o"></span>
                          </span>
                        </div>
                    </div>                         
                </div>
               
                <div class="form-group row col-md-12">
                    <label class="col-md-3">Priority :</label>
                    <div class="col-md-6 required-red">
                        <select name="priority" class="form-control" required>
                            <option value="">Select a Priority</option>
                            @foreach($priorities as $key=>$value)
                                <option {{isset($task) && $task->priority == $key ? 'selected' : '' }} value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('priority'))
                            <strong class="text-danger">{{ $errors->first('priority') }}</strong>
                        @endif
                    </div>                      
                </div>
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-danger col-md-offset-3">Confirm</button>
            </div>
            <!-- /.box-footer -->
            </form>
          </div>
        </div>
</section>

<script>
  $('.datetpicker').datetimepicker({ format: 'L'});
  $('.timetpicker').datetimepicker({ format: 'LT'});
</script>
@endsection

