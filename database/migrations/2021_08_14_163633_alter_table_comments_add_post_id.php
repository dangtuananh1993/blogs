<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCommentsAddPostId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('comments',function(Blueprint $table) {
            $table->tinyInteger('post_id')->nullable();  
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       schema::table('comments',function(Blueprint $table) {
            $table->dropColumn('post_id');  
        });
    }
}
