<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachineLayoutCoordinatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_layout_coordinates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            //$table->bigInteger('id')->default(0)->nullable();
            $table->boolean('is_visible')->default(1)->nullable();
            $table->unsignedBigInteger('machine_layout_id')->index()->nullable();
            $table->double('position_x')->default(0)->nullable();
            $table->double('position_y')->default(0)->nullable();
            $table->double('position_z')->default(0)->nullable();
            $table->double('scale_x')->default(0)->nullable();
            $table->double('scale_y')->default(0)->nullable();
            
            $table->foreign('machine_layout_id')->references('id')->on('machine_layouts')->onUpdate('cascade');
            //$table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine_layout_coordinates');
    }
}
