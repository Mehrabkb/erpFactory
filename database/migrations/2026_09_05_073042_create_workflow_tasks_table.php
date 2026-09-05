<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workflow_tasks',function(Blueprint $table){


            $table->id();


            $table->foreignId('workflow_instance_id')
                ->constrained();


            $table->foreignId('step_id')
                ->constrained('process_steps');


            $table->foreignId('assigned_to')
                ->nullable();


            $table->enum('status',[

                'pending',
                'in_progress',
                'completed',
                'rejected'

            ])
                ->default('pending');


            $table->timestamp('started_at')
                ->nullable();


            $table->timestamp('finished_at')
                ->nullable();


            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workflow_tasks');
    }
};
