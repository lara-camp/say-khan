<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_records', function (Blueprint $table) {
            $table->id();
            $table->decimal('bodytemp', 8, 2);
            $table->string('currentsituation');
            $table->integer('bloodpressure');
            $table->integer('heartrate');
            $table->string('remark');
            $table->decimal('weight', 8, 2);
            $table->decimal('height', 8, 2);
            $table->string('medicalimage1');
            $table->string('medicalimage2');
            $table->decimal('totalfee', 10, 2);
            $table->foreignId('patient_id')->nullable();
            $table->foreignId('assistant_id')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_records');
    }
};
