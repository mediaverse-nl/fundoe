<?php

use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        \App\Faq::insert([[
            'title' => 'Hoe maak ik een account?',
            'description' => $faker->text(220),
        ], [
            'title' => 'Hoe log ik in',
            'description' => $faker->text(150),
        ],[
            'title' => 'Kan ik events delen?',
            'description' => $faker->text(200),
        ]]);
    }
}
