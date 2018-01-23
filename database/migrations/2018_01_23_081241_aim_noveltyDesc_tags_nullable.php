<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AimNoveltyDescTagsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('aim')->nullable()->change();
            $table->string('tags')->nullable()->change();
            $table->text('novelty_desc')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('aim')->nullable($value=false)->change();
            $table->string('tags')->nullable($value=false)->change();
            $table->text('novelty_desc')->nullable($value=false)->change();
        });
    }
}
