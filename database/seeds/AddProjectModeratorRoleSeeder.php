<?php

use Illuminate\Database\Seeder;

class AddProjectModeratorRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert(
          array('id' => 5, 'name' => 'project_moderator')
      );
    }
}
