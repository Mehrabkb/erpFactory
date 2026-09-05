<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::latest()->paginate(10);

        return view(
            'admin.departments.index',
            compact('departments')
        );
    }



    public function create()
    {
        return view(
            'admin.departments.create'
        );
    }




    public function store(Request $request)
    {

        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],

        ]);



        Department::create([

            'name' => $validated['name'],

            'is_active' => true,

        ]);



        return redirect()
            ->route('departments.index')
            ->with(
                'success',
                'واحد با موفقیت ایجاد شد.'
            );

    }





    public function show(Department $department)
    {
        return view(
            'admin.departments.show',
            compact('department')
        );
    }






    public function edit(Department $department)
    {

        return view(
            'admin.departments.edit',
            compact('department')
        );

    }





    public function update(
        Request $request,
        Department $department
    ) {

        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'is_active' => [
                'required',
                'boolean'
            ],

        ]);


        $department->update([

            'name' => $validated['name'],

            'is_active' => $validated['is_active'],

        ]);



        return redirect()
            ->route('departments.index')
            ->with(
                'success',
                'واحد با موفقیت بروزرسانی شد.'
            );

    }






    public function destroy(
        Department $department
    )
    {

        // حذف واقعی نمی‌کنیم
        $department->update([

            'is_active'=>false

        ]);



        return redirect()
            ->route(
                'departments.index'
            )
            ->with(
                'success',
                'واحد غیرفعال شد.'
            );

    }

}
