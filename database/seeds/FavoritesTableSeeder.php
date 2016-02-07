<?php

use Illuminate\Database\Seeder;
use App\Models\Advertisement;
use App\Models\User;

class FavoritesTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('favorites')->truncate();

        foreach(range(1, 30) as $index)
        {
            $ads = Advertisement::orderBy(DB::raw('RAND()'))->first();
            User::orderBy(DB::raw('RAND()'))->first()->favorites()->attach($ads->id);
        }
    }

}