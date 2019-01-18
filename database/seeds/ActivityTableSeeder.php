<?php

use App\Activity;
use Illuminate\Database\Seeder;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = \App\Category::count();

        Activity::insert([[
            'title' => 'Zaal voetbal ',
            'description' => 'asdadad asd asdas dsad sfaf aas',
            'category_id' => random_int(1, $categories),
            'img' => 'dd',
            'price' => 22.14,
            'start_datetime' => \Carbon\Carbon::now()->toDateTimeString(),
            'region' => 'Eindhoven'
        ], [
            'title' => 'zaal badminton ',
            'description' => 'asdadad asd asdas dsad sfaf aas',
            'category_id' => random_int(1, $categories),
            'img' => 'dd',
            'price' => 25.54,
            'start_datetime' => \Carbon\Carbon::now()->toDateTimeString(),
            'region' => 'Veldhoven'
        ],[
            'title' => 'buiten badminton ',
            'description' => 'asdadad asd asdas dsad sfaf aas',
            'category_id' => random_int(1, $categories),
            'img' => 'dd',
            'price' => 25.54,
            'start_datetime' => \Carbon\Carbon::now()->toDateTimeString(),
            'region' => 'Eindhoven'
        ]]);
    }
}
