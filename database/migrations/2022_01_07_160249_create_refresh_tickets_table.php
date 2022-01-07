<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefreshTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refresh_tickets', function (Blueprint $table) {
            $table->id();
            // The two below should be the combined primary key. Every user id will have a node list relating
            // back to previous tickets. When a ticket is reached that is not active, stop.
            // This will also serve as a record of evey front-end data refresh that is performed per resource.
            $table->integer('user_id'); //
            $table->integer('parent_id'); // previous ticket id
            $table->integer('resource'); // Which resource that needs refresh.
            $table->boolean('is_active'); // Whether or not it has been completed
            $table->dateTime('dt_completed')->nullable()->default(null); // Time that the refresh was completed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refresh_tickets');
    }
}
