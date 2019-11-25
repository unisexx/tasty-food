<?php

use Illuminate\Database\Seeder;

class ProductItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i <= 10; $i++) :
            DB::table('product_items')
                ->insert([
                    'brand'       => $faker->name,
                    'name'        => $faker->sentence,
                    'description' => $faker->text,
                    'stock'       => $faker->numberBetween(0, 100),
                    'status'      => $faker->numberBetween(0, 1),
                    'created_at'     => $faker->dateTimeBetween('-30 days', 'now', null)
                ]);
        endfor;
    }
}
