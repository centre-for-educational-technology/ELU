<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('pages')->delete();


        \App\Page::create(array(
            'title' => 'Esilehe Uudis',
            'body' => 'Sisu',
            'permalink' => 'news',
        ));

        \App\Page::create(array(
            'title' => 'KKK',
            'body' => 'Sisu',
            'permalink' => 'faq',
        ));

        \App\Page::create(array(
            'title' => 'Üldinfo',
            'body' => 'Sisu',
            'permalink' => 'info',
        ));
    }
}
