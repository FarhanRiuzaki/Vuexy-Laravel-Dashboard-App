<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDataTypeAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',  function(Blueprint $table){
            $table->uuid('created_by')->change();
            $table->uuid('updated_by')->change();
        });
        Schema::table('pages',  function(Blueprint $table){
            $table->uuid('created_by')->change();
            $table->uuid('updated_by')->change();
        });
        Schema::table('templates',  function(Blueprint $table){
            $table->uuid('created_by')->change();
            $table->uuid('updated_by')->change();
        });
        Schema::table('template_details',  function(Blueprint $table){
            $table->uuid('created_by')->change();
            $table->uuid('updated_by')->change();
        });
        Schema::table('merchants',  function(Blueprint $table){
            $table->uuid('created_by')->change();
            $table->uuid('updated_by')->change();
        });
        Schema::table('channels',  function(Blueprint $table){
            $table->uuid('created_by')->change();
            $table->uuid('updated_by')->change();
        });
        Schema::table('components',  function(Blueprint $table){
            $table->uuid('created_by')->change();
            $table->uuid('updated_by')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
