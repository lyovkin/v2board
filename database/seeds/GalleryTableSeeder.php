<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GalleryTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('galleries')->delete();
        Model::unguard();

        DB::table('galleries')->insert(
            array('slug' => 'testSlug',
                'title' => 'testTitle',
                'article' => 'testArticle',
                'description' => $faker->paragraph(4),
                'tags' => 'tag1',
                'columns' => 3,
                'created_at' => 'NOW()',
                'updated_at' => 'NOW()'
                //hash image
            ));
    }
}