<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cities;

class UserTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('users')->delete();

        $user = User::create([
            'email' => 'admin@admingmail.com',
            'password' => Hash::make('123456'),
            'user_name' => 'admin',
            'ads_rise' => 5,
            'blocked' => 0,
            'balance' => 0,
        ]);
        foreach(range(2, 30) as $index)
        {
            $user = User::create([
                'email' => $faker->email,
                'password' => Hash::make('1234'),
                'user_name' => $faker->userName,
                'ads_rise' => 5,
                'blocked' => rand(0,1),
                'balance' => 0,
            ]);

            $city_id = Cities::orderBy(DB::raw('RAND()'))->first()->id;

            \ZaWeb\Profile\Models\Profile::create([
                'user_id' => $user->id,
                'name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'about' => $faker->sentence(10),
                'city_id'=> $city_id
            ]);
        }
    }
}