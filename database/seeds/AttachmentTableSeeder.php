<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AttachmentTableSeeder extends Seeder
{

    public function run()
    {
        \Illuminate\Support\Facades\DB::table('attachment')->delete();
        Model::unguard();

        \App\Models\Attachment::create([
            'name' => 'test', 
            'path'=>'tesst',

        ]);


      
    }

}