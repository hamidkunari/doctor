<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
             $table->integer('supplier_id')->nullable();
            $table->string('name');
            $table->string('address');
            $table->string('date');
            $table->string('earned');
            $table->string('status');
            $table->string('bio');
            $table->string('description');
            $table->string('school');
            $table->string('sstartd');
            $table->string('sendd');
            $table->string('university');
            $table->string('course');
            $table->string('startd');
            $table->string('endd');
            $table->string('cname');
            $table->string('workd');
            $table->string('workdd');
            $table->string('photo')->nullable();
            
            
            // $table->date('year');
            // $table->string('experience_details');
          
            
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
        Schema::dropIfExists('doctors');
    }
}
