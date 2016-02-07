<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StaticPagesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('static_pages')->truncate();
        Model::unguard();

        DB::table('static_pages')->insert(
            array('slug' => 'testSlug',
                'title' => 'testTitle',
                'article' => 'testArticle',
                'description' => $faker->paragraph(4),
                'tags' => 'tag1',
                'created_at' => 'NOW()',
                'updated_at' => 'NOW()'
            ));
    }

}