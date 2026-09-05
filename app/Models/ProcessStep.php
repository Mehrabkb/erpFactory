<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessStep extends Model
{


    protected $fillable=[

        'process_id',
        'name',
        'sort_order',
        'department_id'

    ];


    public function process()
    {

        return $this->belongsTo(Process::class);

    }
    public function department()
    {
        return $this->belongsTo(
            Department::class
        );
    }
}
