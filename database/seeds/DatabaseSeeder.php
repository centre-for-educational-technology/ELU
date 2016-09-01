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

    }
}
