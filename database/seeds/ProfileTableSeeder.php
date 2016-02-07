<?php

use Illuminate\Database\Seeder;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\User;
use App\Models\Cities;
use App\Models\AdType;

class ProfileTableSeeder extends Seeder
{

    public function run()
    {
       // DB::table('profiles')->delete();

        \ZaWeb\Profile\Models\Profile::create(array('user_id' => 1, 'name' => 'Василий', 'last_name' => 'Иванов',
        'about' => 'Site admin', 'city_id'=>1));
    }

}