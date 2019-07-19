<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class CreateLayoutMachineOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layout_machine_operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            //$table->bigInteger('id')->default(0)->nullable();
            $table->boolean('is_visible')->default(1)->nullable();
            $table->unsignedBigInteger('machine_layout_id')->index()->nullable();
            $table->unsignedBigInteger('operation_breakdown_work_id')->index()->nullable();
            $table->text('description')->nullable();
            
            $table->foreign('machine_layout_id')->references('id')->on('machine_layouts')->onUpdate('cascade');
            $table->foreign('operation_breakdown_work_id')->references('id')->on('operation_breakdown_works')->onUpdate('cascade');
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
        Schema::dropIfExists('layout_machine_operations');
    }
}
