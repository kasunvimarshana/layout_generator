<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachineLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_layouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            //$table->unsignedBigInteger('id')->default(0)->nullable();
            $table->boolean('is_visible')->default(1)->nullable();
            $table->unsignedBigInteger('operation_breakdown_id')->index()->nullable();
            $table->morphs('layoutable');
            $table->double('position_x')->default(0)->nullable();
            $table->double('position_y')->default(0)->nullable();
            $table->double('position_z')->default(0)->nullable();
            $table->double('scale_x')->default(0)->nullable();
            $table->double('scale_y')->default(0)->nullable();
            $table->text('description')->nullable();
            $table->string('colour')->index()->nullable();
            $table->decimal('width')->default(0)->nullable();
            $table->decimal('height')->default(0)->nullable();
            
            $table->foreign('operation_breakdown_id')->references('id')->on('operation_breakdowns')->onUpdate('cascade');
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
        Schema::dropIfExists('machine_layouts');
    }
}
