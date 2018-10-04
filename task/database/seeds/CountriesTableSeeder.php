<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
DB::table('countries')->insert(array(
     array(
       'title' => 'Migration and Seeder',
       'image' => $faker->image('images',400,300),
     ),
     array(
       'title' => 'ghana',
      'image' => $faker->image('images',400,300),
     ),
        ));

    }
}
