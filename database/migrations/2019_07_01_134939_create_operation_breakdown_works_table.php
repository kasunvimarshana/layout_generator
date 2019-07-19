<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class CreateOperationBreakdownWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_breakdown_works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            //$table->bigInteger('id')->default(0)->nullable();
            $table->boolean('is_visible')->default(1)->nullable();
            $table->unsignedBigInteger('operation_breakdown_id')->index()->nullable();
            $table->string('operation_pk')->index()->nullable();
            $table->string('machine_type_pk')->index()->nullable();
            $table->decimal('smv')->default(0)->nullable();
            $table->decimal('actual_operator_load')->default(0)->nullable();
            $table->decimal('number_of_machine_allocation')->default(0)->nullable();
            $table->bigInteger('work_number')->default(0)->nullable();
            $table->text('description')->nullable();
            $table->text('attachment')->nullable();
            $table->boolean('is_dirty')->default(0)->nullable();
            
            $table->foreign('operation_breakdown_id')->references('id')->on('operation_breakdowns')->onUpdate('cascade');
            $table->foreign('operation_pk')->references('name')->on('operations')->onUpdate('cascade');
            $table->foreign('machine_type_pk')->references('name')->on('machine_types')->onUpdate('cascade');
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
        Schema::dropIfExists('operation_breakdown_works');
    }
}
