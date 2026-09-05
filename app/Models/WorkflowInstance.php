<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkflowInstance extends Model
{


    protected $fillable=[

        'process_id',
        'entity_type',
        'entity_id',
        'current_step_id',
        'status'

    ];


    public function tasks()
    {

        return $this->hasMany(
            WorkflowTask::class
        );

    }
    public function currentStep()
    {
        return $this->belongsTo(
            ProcessStep::class,
            'current_step_id'
        );
    }

}
