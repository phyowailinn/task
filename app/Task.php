<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'task_id';
    protected $fillable = ['type','company','contact','subject','assigned_to','due_date','reminder','priority','created_by','updated_by'];

    public function getCreatedAttribute()
    {
        return date('d M, Y',strtotime($this->created_at));
    }

    public function getDueDayAttribute()
    {
        return date('M j - ',strtotime($this->due_date));
    }

    public function getDueTimeAttribute()
    {
        return date('H:i',strtotime($this->due_date)!=0)?date('g:i a',strtotime($this->due_date)):null;
    }

    public function getReminderDayAttribute()
    {
        return ($this->reminder)?date('M j - ',strtotime($this->reminder)):null;
    }

    public function getReminderTimeAttribute()
    {
        return $this->reminder && date('H:i',strtotime($this->reminder)!=0)?date('g:i a',strtotime($this->reminder)):null;
    }

    public function getTaskTypeAttribute()
    {
    	return array_key_exists($this->type,config('constants.types'))?config('constants.types')[$this->type]:null;
    }

    public function getPriorityTypeAttribute()
    {
    	return array_key_exists($this->priority,config('constants.priorities'))?config('constants.priorities')[$this->priority]:null;
    }

    public function creator()
    {
    	return $this->belongsTo(User::class,'created_by');
    }

    public function assigned()
    {
    	return $this->belongsTo(User::class,'assigned_to');
    }

    public function contact_by()
    {
    	return $this->belongsTo(User::class,'contact');
    }

    public function getStatusAttribute()
    {
        switch ($this->priority) {
            case 1:
                $result = 'primary';
                break;
            case 2:
                $result = 'warning';
                break;
            case 3:
                $result = 'danger';
                break;
            
            default:break;
        }
        return $result;
    }
}
