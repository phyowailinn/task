<?php

namespace App\Observers;
use App\Task;
use App\Events\SendMail;

class TaskObserver
{
    public function created(Task $task)
    {	
        $receiver = $task->assigned;
    	event( new SendMail( $task,$receiver ) );
    }

    public function updated(Task $task)
    {
        $receiver = ( auth()->id() == $task->assigned_to ) ? $task->creator : $task->assigned;
    	event( new SendMail( $task,$receiver ) );
    }
}
