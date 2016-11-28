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
//
//      \App\Role::create(array(
//          'name' => 'oppejoud',
//      ));
//
//      \App\Role::create(array(
//          'name' => 'student',
//      ));
//
//      \App\Role::create(array(
//          'name' => 'admin',
//      ));


      DB::table('roles')->insert(
          array('id' => 1, 'name' => 'oppejoud')
      );

      DB::table('roles')->insert(
          array('id' => 2, 'name' => 'student')
      );

      DB::table('roles')->insert(
          array('id' => 3, 'name' => 'admin')
      );
    }
}
