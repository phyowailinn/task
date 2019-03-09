@component('mail::message')

# Hello {{$task->creator->name}},

A new task ({{$task->company}} - {{$task->subject}}) is assigned to you.

@component('mail::panel')
<span style="color: #ffffff">Task Details</span>
@endcomponent

@component('mail::table')
|        |          |
| ------------- | ------------- |
| <b>Subject/Object</b> | {{$task->subject}}  			|    
| <b>Due Date</b>      	| {{$task->due_date}} 		|
| <b>Priority</b>      	| {{$task->priority_type}} 		|
| <b>Task Type</b>     	| {{$task->task_type}} 			|
| <b>Company</b>      	| {{$task->company}} 			|
| <b>Contact</b>     	| {{$task->contact_by->name}} 	|
| <b>Created By</b>     | {{$task->creator->name}} 		|
@endcomponent


<a href="{{ $url }}" class="button button-red" target="_blank">View Task</a>

<br>
<small>Regards</small>,<br>
<strong>SEEDSTARs WORKD</strong>
<br><br>

@component('mail::subcopy')
If you’re having trouble clicking the "View Task" button, copy and paste the URL below
into your web browser: [{{ $url }}]({{ $url }})
@endcomponent

@endcomponent