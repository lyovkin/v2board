<?php
use Illuminate\Database\Seeder;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\User;
use App\Models\Cities;
use App\Models\AdType;

class AdsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('advertisement')->delete();

        foreach(range(1, 30) as $index)
        {
            $category_id = Category::orderBy(DB::raw('RAND()'))->first()->id;
            $city_id = Cities::orderBy(DB::raw('RAND()'))->first()->id;
            $type_id = AdType::orderBy(DB::raw('RAND()'))->first()->id;
           // $a_hash = AdsAttachment::orderBy(DB::raw('RAND()'))->first()->hash;

            Advertisement::create([
                'category_id' => $category_id,
                'text' => $faker->paragraph(4),
                'user_id' => 1,
                'city_id' => $city_id,
                'type_id' => $type_id,
             //   'attachment_hash' => $a_hash,
                'price' => 12345,
                'approved' => rand(0, 1),
            ]);
        }
    }
}