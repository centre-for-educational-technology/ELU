<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GroupMaterialsAndPostersDriveIdsToGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->text('group_posters_gdrive_ids')->nullable();
            $table->text('group_materials_gdrive_ids')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->dropColumn('group_posters_gdrive_ids');
            $table->dropColumn('group_materials_gdrive_ids');
        });
    }
}
