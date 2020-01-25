<?php

use Illuminate\Database\Seeder;

class GenerateUsersSeeder extends Seeder
{
    /**
     * Generate users for testing.
     *
     * @return void
     */
    public function run()
    {
        //40 students with 4 different majors(eriala)
        for ($i=1; $i < 5; $i++) { 

            factory(App\User::class, 10)->create()->each(function ($u) use($i) {
                $u->roles()->attach(2);
                $u->courses()->sync([$i => ['degree' => 'bachelor']]);
            });
        
        };

        //10 students without course and full_name
        factory(App\User::class, 5)->create(['full_name' => ''])->each(function ($u) use($i) {
            $u->roles()->attach(2);
        });

        //5 teachers
        factory(App\User::class, 5)->create()->each(function ($u) use($i) {
            $u->roles()->attach(1);
        });
        
        $this->command->info('Generated 40 students with course, 5 without and 5 teachers!');
    }
}
