<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToDoItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_do_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('content', 255);
			$table->dateTime('edit_date');
			$table->date('start_date');
			$table->date('end_date');
			$table->boolean('finished');
			$table->string('author', 50);
			$table->integer('user_id')->unsigned();
			$table->index('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
		
		DB::unprepared('
			CREATE TRIGGER `before_update_to_do_items` BEFORE UPDATE ON `to_do_items` FOR EACH ROW
			BEGIN
				SET NEW.edit_date = NOW();
			END
		');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('to_do_items');
    }
}
