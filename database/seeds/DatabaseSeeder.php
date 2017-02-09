<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('PagesTableSeeder');
        $this->command->info('Pages table seeded.');


        $this->call('MakeAdminSeeder');
        $this->command->info('User with id 1 is assigned to admin role.');

        $this->call('CoursesTableSeeder');
        $this->command->info('Courses table seeded.');


        $this->call('RolesTableSeeder');
        $this->command->info('Roles table seeded.');

        $this->call('DeleteRoleColumnInUserSeeder');
        $this->command->info('Role column deleted from User table.');

        $this->call('AddSuperAdminRoleSeeder');
        $this->command->info('Super admins addedv');
    }
}
