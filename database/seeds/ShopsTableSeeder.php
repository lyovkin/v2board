<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder{

    public function run()
    {

        $faker = Faker\Factory::create();

        DB::table('shops')->delete();

        foreach (range(1, 3) as $index) {
            $city_id = \App\Models\Cities::orderBy(DB::raw('RAND()'))->first()->id;
            $user_id = rand(1, 3);
            $profile_id = \ZaWeb\Shops\Models\ShopProfile::orderBy(DB::raw('RAND()'))->first()->id;
            $attachment_id = \App\Models\Attachment::orderBy(DB::raw('RAND()'))->first()->id;

            \ZaWeb\Shops\Models\Shops::create([
                'user_id' => $user_id,
                'city_id' => $city_id,
                'capacity' => 300,
                'attachment_id' => $attachment_id,
                'profile_id' => $profile_id,
                'created_at' => date('Y-m-d G:i:s'),
                'updated_at' => date('Y-m-d G:i:s')
            ]);
        }
    }
}