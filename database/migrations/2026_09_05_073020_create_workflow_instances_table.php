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
        Schema::create('workflow_instances',function(Blueprint $table){


            $table->id();


            $table->foreignId('process_id')
                ->constrained();


            $table->string('entity_type');


            $table->unsignedBigInteger('entity_id');


            $table->foreignId('current_step_id')
                ->nullable();


            $table->enum('status',[

                'pending',
                'running',
                'completed',
                'cancelled'

            ])
                ->default('pending');


            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workflow_instances');
    }
};
