<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('task_id');
            $table->integer('type')->comment('1=>Planned Meeting,2=>TGIF');
            $table->string('company',100);
            $table->integer('contact');
            $table->text('subject');
            $table->integer('assigned_to');
            $table->dateTime('due_date');
            $table->dateTime('reminder')->nullable();
            $table->integer('priority')->comment('1=>Poor,2=>Medium,3=>Important');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
