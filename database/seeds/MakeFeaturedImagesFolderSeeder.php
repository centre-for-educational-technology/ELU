<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MakeFeaturedImagesFolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      File::makeDirectory(public_path('storage/projects_featured_images'), 0777, true);
    }
}
