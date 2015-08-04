<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('firstname');
            
            $table->string('lastname')
                ->nullable();
            
            $table->string('email')
                ->nullable();
            
            $table->string('website')
                ->nullable();
            
            $table->string('phone')
                ->nullable();
            
            $table->text('notes')
                ->nullable();

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
        Schema::drop('contacts');
    }
}
