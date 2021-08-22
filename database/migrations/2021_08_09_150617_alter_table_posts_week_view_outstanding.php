<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePostsWeekViewOutstanding extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       schema::table('posts',function(Blueprint $table) {
            $table->integer('week_views')->nullable();
            $table->tinyInteger('outstanding')->nullable();
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('posts',function(Blueprint $table) {
            
            $table->dropColumn('week_views');
            $table->dropColumn('outstanding');
        });
    }
}
