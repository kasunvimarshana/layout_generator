<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class CreateMachineTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_types', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->timestamps();
            
            $table->unsignedBigInteger('id')->default(0)->nullable();
            $table->boolean('is_visible')->default(1)->nullable();
            $table->string('name')->index()->unique();
            $table->string('display_name')->index()->nullable();
            $table->integer('order')->default(0)->nullable();
            $table->string('colour')->index()->nullable();
            $table->decimal('width')->default(0)->nullable();
            $table->decimal('height')->default(0)->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(1)->nullable();
            $table->boolean('is_layoutable')->default(1)->nullable();    
            //$table->softDeletes();
            
            //$table->dropPrimary('id');
            //$table->primary('name');
            $table->primary(array('name'));
            
            //$table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade');
        });
        
        DB::statement('ALTER TABLE machine_types MODIFY COLUMN id INTEGER NOT NULL UNIQUE AUTO_INCREMENT;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine_types');
    }
}
