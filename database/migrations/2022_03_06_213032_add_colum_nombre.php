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
        Schema::table('ROOMS', function (Blueprint $table) {
            $table->text(column:'NAME');
            $table->boolean('DELETE')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ROOMS', function (Blueprint $table) {
            $table->dropColumn(column:'NAME');
            $table->dropColumn(column:'DELETE');
        });
    }
};
