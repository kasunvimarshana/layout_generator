<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationBreakdownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_breakdowns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            //$table->bigInteger('id')->default(0)->nullable();
            $table->boolean('is_visible')->default(1)->nullable();
            $table->string('style_number')->index()->nullable();
            $table->decimal('number_of_operators')->default(0)->nullable();
            $table->decimal('initial_target')->default(0)->nullable();
            $table->decimal('bindle_size')->default(0)->nullable();
            $table->string('customer')->index()->nullable();
            $table->string('company_pk')->index()->nullable();
            $table->string('factory_pk')->index()->nullable();
            $table->string('line_pk')->index()->nullable();
            $table->text('description')->nullable();
            
            $table->foreign('company_pk')->references('name')->on('companies')->onUpdate('cascade');
            $table->foreign('factory_pk')->references('name')->on('factories')->onUpdate('cascade');
            $table->foreign('line_pk')->references('name')->on('lines')->onUpdate('cascade');
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
        Schema::dropIfExists('operation_breakdowns');
    }
}
