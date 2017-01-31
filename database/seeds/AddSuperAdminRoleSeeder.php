<?php

use Illuminate\Database\Seeder;
use App\User;

class AddSuperAdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert(
          array('id' => 4, 'name' => 'superadmin')
      );


      $user = User::where('email', 'LIKE', 'glebred@tlu.ee')->first();

      if(!empty($user)){
        $user->roles()->attach(4);
      }

      $user = User::where('email', 'LIKE', 'tammets@tlu.ee')->first();

      if(!empty($user)){
        $user->roles()->attach(4);
      }


      $user = User::where('email', 'LIKE', 'aido@tlu.ee')->first();

      if(!empty($user)){
        $user->roles()->attach(4);
      }


      $user = User::where('email', 'LIKE', 'gnum@tlu.ee')->first();

      if(!empty($user)){
        $user->roles()->attach(4);
      }


    }
}
