<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMechanicSpecialtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mechanic_specialties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('job_type');
            $table->foreignId('mechanic_id')->constrained();
            $table->unique(['mechanic_id', 'job_type'], 'unique_job_type_mechanic_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('mechanic_specialties');
    }
}
