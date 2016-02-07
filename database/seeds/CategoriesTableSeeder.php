<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
            \Illuminate\Support\Facades\DB::table('categories')->delete();
            Model::unguard();

            \App\Models\Category::create([
                'title' => 'Тестовая категория', 
                'description'=>'Тест тест',
                'attachment_id'=>'1',
                'alias' => 'test'

            ]);
	}

}
