<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopProfileTableSeeder extends Seeder{

    public function run()
    {

        $faker = Faker\Factory::create();

        DB::table('shop_profiles')->delete();

        foreach (range(1, 10) as $index) {

            \ZaWeb\Shops\Models\ShopProfile::create([
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'description' => $faker->paragraph(4)
            ]);
        }
    }

}