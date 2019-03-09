<?php

namespace App\Policies;

use App\User;
use App\Task;

use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Task $task)
    {
        if (in_array($user->id,[$task->created_by,$task->assigned_to])) {
            return true;
        }

        return false;
    }
}
