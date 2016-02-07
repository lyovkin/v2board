<?php
use Illuminate\Database\Seeder;
use App\Models\AdType;

class AdTypeTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('ad_types')->delete();

        AdType::create([
            'name' => 'Продам',
            'description' => $faker->sentence(8)
        ]);

        AdType::create([
            'name' => 'Куплю',
            'description' => $faker->sentence(8)
        ]);

        AdType::create([
            'name' => 'Отдам',
            'description' => $faker->sentence(8)
        ]);

    }
}