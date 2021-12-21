<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadBulkDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_bulk_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('phone_number')->nullable();
            $table->string('type')->nullable();
            $table->string('adjust_point')->nullable();
            $table->string('remark')->nullable();
            $table->integer('status')->nullable();
            $table->text('response')->nullable();            
            $table->dateTime('start_time')->nullable();            
            $table->dateTime('response_time')->nullable();            
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
        Schema::dropIfExists('upload_bulk_details');
    }
}
