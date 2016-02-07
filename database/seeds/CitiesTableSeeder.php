<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CitiesTableSeeder extends Seeder
{

    public function run()
    {
        \Illuminate\Support\Facades\DB::table('cities')->delete();
        Model::unguard();

        \App\Models\Cities::create(array('city_name' => 'Воркута'));
        \App\Models\Cities::create(array('city_name' => 'Инта'));
    }

}