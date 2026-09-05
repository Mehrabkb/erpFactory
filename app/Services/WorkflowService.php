<?php

namespace App\Services;

use App\Models\Process;
use App\Models\ProcessStep;
use App\Models\WorkflowTask;
use App\Models\WorkflowInstance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class WorkflowService
{

    /**
     * شروع یک Workflow برای یک Entity
     *
     * مثال:
     * یک Order وارد فرآیند تولید می‌شود
     */
    public function start(
        Process $process,
        Model $model
    ): WorkflowInstance {


        return DB::transaction(function () use (
            $process,
            $model
        ) {


            $firstStep = $process
                ->steps()
                ->orderBy('sort_order')
                ->first();



            if (!$firstStep) {

                throw new \Exception(
                    'این فرآیند هیچ مرحله‌ای ندارد.'
                );

            }



            $instance = WorkflowInstance::create([

                'process_id' => $process->id,

                'entity_type' => get_class($model),

                'entity_id' => $model->id,

                'current_step_id' => $firstStep->id,

                'status' => 'running',

            ]);



            $this->createTask(
                $instance,
                $firstStep
            );



            return $instance;


        });

    }




    /**
     * ایجاد Task برای مرحله فعلی
     */
    private function createTask(
        WorkflowInstance $instance,
        ProcessStep $step
    ): WorkflowTask {


        return WorkflowTask::create([

            'workflow_instance_id' =>
                $instance->id,


            'step_id' =>
                $step->id,


            'status' =>
                'pending',

        ]);

    }





    /**
     * شروع یک Task توسط کارمند
     */
    public function startTask(
        WorkflowTask $task
    ): WorkflowTask {


        $task->update([

            'status' => 'in_progress',

            'started_at' => now(),

        ]);


        return $task;

    }





    /**
     * پایان دادن به Task
     */
    public function completeTask(
        WorkflowTask $task
    ): void {


        DB::transaction(function () use ($task) {


            $task->update([

                'status' => 'completed',

                'finished_at' => now(),

            ]);



            $this->moveToNextStep(

                $task->workflowInstance

            );


        });


    }







    /**
     * انتقال Workflow به مرحله بعد
     */
    private function moveToNextStep(
        WorkflowInstance $instance
    ): void {


        $currentStep = ProcessStep::find(
            $instance->current_step_id
        );



        $nextStep = ProcessStep::where(
            'process_id',
            $instance->process_id
        )
            ->where(
                'sort_order',
                '>',
                $currentStep->sort_order
            )
            ->orderBy('sort_order')
            ->first();





        // اگر مرحله بعد وجود نداشت
        // یعنی فرآیند تمام شده

        if (!$nextStep) {


            $instance->update([

                'status' => 'completed',

            ]);


            return;

        }






        $instance->update([

            'current_step_id' =>
                $nextStep->id,

        ]);





        $this->createTask(

            $instance,

            $nextStep

        );


    }






    /**
     * گرفتن Task فعال فعلی یک Workflow
     */
    public function currentTask(
        WorkflowInstance $instance
    ): ?WorkflowTask {


        return $instance
            ->tasks()
            ->whereIn(
                'status',
                [
                    'pending',
                    'in_progress'
                ]
            )
            ->latest()
            ->first();

    }



}
