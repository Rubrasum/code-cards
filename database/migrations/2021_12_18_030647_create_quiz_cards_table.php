<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_cards', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(1);
            $table->boolean('is_archived')->default(0);
            $table->string('group')->default('none');
            $table->string('parent')->default('none');
            $table->string('type')->default('none');
            $table->string('data_string_1');
            $table->string('data_string_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_cards');
    }
}
