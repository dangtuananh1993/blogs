<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsersAddressBioGenderType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('users',function(Blueprint $table) {
            $table->string('address')->nullable();
            $table->text('bio')->nullable();
            $table->tinyInteger('gender')->default(1);
            $table->tinyInteger('type')->default(1);
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         schema::table('users',function(Blueprint $table) {
            
            $table->dropColumn('address');
            $table->dropColumn('bio');
            $table->dropColumn('gender');
            $table->dropColumn('type');
        });
    }
}
