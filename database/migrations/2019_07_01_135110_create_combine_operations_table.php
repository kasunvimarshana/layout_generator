<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombineOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combine_operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            //$table->bigInteger('id')->default(0)->nullable();
            $table->boolean('is_visible')->default(1)->nullable();
            $table->unsignedBigInteger('operation_breakdown_id')->index()->nullable();
            $table->unsignedBigInteger('operation_combine_type_id')->index()->nullable();
            $table->string('colour')->index()->nullable();
            $table->text('description')->nullable();
            
            $table->foreign('operation_breakdown_id')->references('id')->on('operation_breakdowns')->onUpdate('cascade');
            $table->foreign('operation_combine_type_id')->references('id')->on('operation_combine_types')->onUpdate('cascade');
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
        Schema::dropIfExists('combine_operations');
    }
}
