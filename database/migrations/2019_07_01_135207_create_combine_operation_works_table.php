<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class CreateCombineOperationWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combine_operation_works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            //$table->bigInteger('id')->default(0)->nullable();
            $table->boolean('is_visible')->default(1)->nullable();
            $table->unsignedBigInteger('combine_operation_id')->index()->nullable();
            $table->unsignedBigInteger('operation_breakdown_work_id')->index()->nullable();
            $table->decimal('combine_value')->default(0)->nullable();
            
            $table->foreign('combine_operation_id')->references('id')->on('combine_operations')->onUpdate('cascade');
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
        Schema::dropIfExists('combine_operation_works');
    }
}
