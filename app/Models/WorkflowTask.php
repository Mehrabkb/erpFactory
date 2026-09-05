<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class WorkflowTask extends Model
{

    protected $fillable = [

        'workflow_instance_id',

        'step_id',

        'assigned_to',

        'status',

        'started_at',

        'finished_at',

    ];



    public function workflowInstance()
    {

        return $this->belongsTo(
            WorkflowInstance::class
        );

    }



    public function step()
    {

        return $this->belongsTo(
            ProcessStep::class
        );

    }



    public function assignedUser()
    {

        return $this->belongsTo(
            User::class,
            'assigned_to'
        );

    }

}
