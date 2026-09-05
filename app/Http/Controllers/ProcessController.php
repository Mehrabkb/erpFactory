<?php

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Http\Request;


class ProcessController extends Controller
{


    public function index()
    {

        $processes = Process::latest()
            ->paginate(10);



        return view(
            'admin.processes.index',
            compact('processes')
        );

    }






    public function create()
    {

        return view(
            'admin.processes.create'
        );

    }






    public function store(Request $request)
    {


        $validated = $request->validate([


            'name'=>[
                'required',
                'string',
                'max:255'
            ],


            'description'=>[
                'nullable',
                'string'
            ]


        ]);




        Process::create([


            'name'=>$validated['name'],


            'description'=>
                $validated['description'] ?? null,


            'is_active'=>true


        ]);




        return redirect()
            ->route('processes.index')
            ->with(
                'success',
                'فرآیند ایجاد شد.'
            );


    }







    public function show(Process $process)
    {


        $process->load([
            'steps.department'
        ]);



        return view(
            'admin.processes.show',
            compact('process')
        );


    }






    public function edit(Process $process)
    {

        return view(
            'admin.processes.edit',
            compact('process')
        );

    }







    public function update(
        Request $request,
        Process $process
    )
    {


        $validated = $request->validate([


            'name'=>[
                'required',
                'string',
                'max:255'
            ],


            'description'=>[
                'nullable',
                'string'
            ]

        ]);



        $process->update([

            'name'=>$validated['name'],

            'description'=>
                $validated['description'] ?? null,

        ]);



        return redirect()
            ->route(
                'processes.index'
            )
            ->with(
                'success',
                'فرآیند بروزرسانی شد.'
            );


    }







    public function destroy(
        Process $process
    )
    {


        $process->update([

            'is_active'=>false

        ]);



        return redirect()
            ->route(
                'processes.index'
            )
            ->with(
                'success',
                'فرآیند غیرفعال شد.'
            );


    }


}
