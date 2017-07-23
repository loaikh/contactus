<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('contact_us', function(Blueprint $table)
	    {
		    $table->increments('id')->unsigned();
		    $table->char('name',100);
		    $table->char('email',20);
		    $table->text('message');
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
        //
	    Schema::drop('contact_us');
    }
}
