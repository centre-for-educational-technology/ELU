<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MakeGroupsGalleriesFolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run()
  {
    File::makeDirectory(public_path('storage/projects_groups_images'), 0755, true);
  }
}
