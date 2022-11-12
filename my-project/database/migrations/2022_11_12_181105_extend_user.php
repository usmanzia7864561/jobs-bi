<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname');
            $table->string('nickname');
            $table->string('username');
            $table->string('phone');
            $table->text('adress');
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('nickname');
            $table->dropColumn('username');
            $table->dropColumn('phone');
            $table->dropColumn('adress');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('zip');
            $table->dropSoftDeletes();
        });
    }
};
