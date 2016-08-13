<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
 
        $faker = Faker\Factory::create();

        $limit = 100000;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('bookdetails')->insert([ //,
                
                'cl_number' => $faker->unique()->randomNumber,
                'cat_num' => '1',
                'author' => $faker->name,
                'edit_translate' => '',
                'pages' => $faker->randomNumber,
                //'img_location' => '',
                'height' => '',
                'series' => $faker->name,
                'series_num' => $faker->randomDigit,
                'isbn' =>  $faker->unique()->randomNumber,
                'remarks' => $faker->text,
                //'lend_count' => '0',
                'published_place' => '',
                'publisher' => $faker->name,
                'published_year' => '2000',
                'date_created' => $faker->dateTime

            ]);
    }
}
}