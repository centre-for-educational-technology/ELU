<?php

use Illuminate\Database\Seeder;

class DeleteRoleColumnInUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Schema::table('users', function ($table) {
        $table->dropColumn('role');
      });

      $user = \App\User::find(2);

      $user->roles()->attach(3);

      $user->save();
    }
}
