<?php

namespace App\Http\Controllers;


use App\Models\Process;
use App\Models\ProcessStep;
use App\Models\Department;

use Illuminate\Http\Request;


class ProcessStepController extends Controller
{


    public function store(
        Request $request,
        Process $process
    )
    {


        $data = $request->validate([


            'name'=>[
                'required',
                'string',
                'max:255'
            ],


            'department_id'=>[
                'nullable',
                'exists:departments,id'
            ]

        ]);



        $lastOrder =
            $process
                ->steps()
                ->max('sort_order') ?? 0;



        $process->steps()->create([


            'name'=>$data['name'],


            'department_id'=>
                $data['department_id'] ?? null,


            'sort_order'=>
                $lastOrder + 1,


        ]);



        return back()
            ->with(
                'success',
                'مرحله اضافه شد'
            );

    }





    public function destroy(
        ProcessStep $step
    )
    {

        $step->update([

            'is_active'=>false

        ]);



        return back();

    }





}
