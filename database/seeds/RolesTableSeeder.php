<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->delete();

      \App\Role::create(array(
          'name' => 'oppejoud',
      ));

      \App\Role::create(array(
          'name' => 'student',
      ));

      \App\Role::create(array(
          'name' => 'admin',
      ));
    }
}
