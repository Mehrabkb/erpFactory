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
        Schema::create('process_steps', function(Blueprint $table){

            $table->id();


            $table->foreignId('process_id')
                ->constrained()
                ->cascadeOnDelete();


            $table->string('name');


            $table->integer('sort_order')
                ->default(1);


            $table->foreignId('department_id')
                ->nullable();


            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('process_steps');
    }
};
