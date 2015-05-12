<?php

use AGCommerce\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('users')->truncate();

        User::create([
            'name'=>'Alexandre Gomes',
            'email'=> 'agomespb@gmail.com',
            'password'=> bcrypt(123456)
        ]);

        $Faker = Faker::create();

        foreach(range(1, 25) as $i){
            User::create([
                'name' => $Faker->sentence(),
                'email'=> $Faker->email(),
                'password'=> bcrypt($Faker->word()),
            ]);
        }

    }
}