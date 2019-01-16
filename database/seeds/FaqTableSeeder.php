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
        \App\Faq::insert([[
            'title' => 'Hoe maak ik een account?',
            'description' => 'asdadad asd asdas dsad sfaf aas',
        ], [
            'title' => 'Hoe log ik in',
            'description' => 'asdadad asd asdas dsad sfaf aas',
        ],[
            'title' => 'Kan ik events delen?',
            'description' => 'Ja zeker.',
        ]]);
    }
}
