<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class NottifactionTypes extends Seeder
{

    public function run()
    {
        \Illuminate\Support\Facades\DB::table('nottification_types')->delete();
        Model::unguard();

        \App\Models\NottifactionTypes::create(array('slug' => 'ads', 'label' => 'объявлению'));
        \App\Models\NottifactionTypes::create(array('slug' => 'questions', 'label' => 'вопросу'));
    }

}