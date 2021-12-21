<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadBulksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_bulks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('filename')->nullable();
            $table->integer('total_trx')->nullable();
            $table->integer('success')->nullable();
            $table->integer('failed')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->timestamps();
        });
        
        Schema::table('upload_bulks',  function(Blueprint $table){
            $table->uuid('created_by')->after('created_at')->nullable();
            $table->uuid('updated_by')->after('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_bulks');
    }
}
