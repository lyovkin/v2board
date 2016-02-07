<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class NavigationTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('navigations')->delete();
        Model::unguard();

        DB::table('navigations')->insert(
            array(
                array('name'=> 'Главная',
                    'link' => '/',
                    'parent_id' => null,
                    'sort_order' => 1,
                    'created_at' => 'NOW()',
                    'updated_at' => 'NOW()'),

                array('name'=> 'Магазины',
                    'link' => '/shops',
                    'parent_id' => null,
                    'sort_order' => 2,
                    'created_at' => 'NOW()',
                    'updated_at' => 'NOW()'),

                array('name'=> 'О нас',
                    'link' => '/about',
                    'parent_id' => null,
                    'sort_order' => 3,
                    'created_at' => 'NOW()',
                    'updated_at' => 'NOW()'),

            ));
    }

}