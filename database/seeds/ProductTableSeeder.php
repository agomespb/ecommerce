<?php

use AGCommerce\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('products')->truncate();

        Product::create([
            'name'=>'Geladeira Brastemp',
            'price'=> \Faker\Provider\pt_BR\Payment::randomFloat(2,357,4999),
            'description'=> 'Geladeira/Refrigerador Frost Free Brastemp Clean 350 Litros',
            'featured' => 0,
            'recommend' => 1
        ]);


        Product::create([
            'name'=>'Fogao Electrolux',
            'price'=> \Faker\Provider\pt_BR\Payment::randomFloat(2,357,4999),
            'description'=> 'Fogao 52SRB com 4 bocas e Timer Digital. Acendimento automatico',
            'featured' => 0,
            'recommend' => 1
        ]);

        Product::create([
            'name'=>'Smart TV Samsung',
            'price'=> \Faker\Provider\pt_BR\Payment::randomFloat(2,357,4999),
            'description'=> 'Smart TV LED 3D 55Pol UN49HII500GXZD Full HD Curva.',
            'featured' => 0,
            'recommend' => 1
        ]);

        $Faker = Faker::create();

        foreach(range(1, 10) as $i){
            Product::create([
                'name'=> $Faker->sentence(),
                'price' => \Faker\Provider\pt_BR\Payment::randomFloat(2,357,4999),
                'description'=> $Faker->paragraph(),
                'featured' => $Faker->boolean(),
                'recommend' => $Faker->boolean()
            ]);
        }
    }
}