<?php

use AGCommerce\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('tags')->truncate();

        foreach(range(1, 15) as $i){
            Tag::create([
                'name'=> "Teste $i"
            ]);
        }
    }
}