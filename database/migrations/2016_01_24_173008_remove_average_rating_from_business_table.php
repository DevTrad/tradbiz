<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveAverageRatingFromBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('businesses', function(Blueprint $table)
		{
            $table->dropColumn('average_rating');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('businesses', function(Blueprint $table)
		{
            $table->text('average_rating')->after('promotion');
        });
    }
}
