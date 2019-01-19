<?php

use App\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $categories = \App\Category::count();

        Activity::insert([[
            'title' => 'Zaal voetbal ',
            'description' => $faker->text(220),
            'category_id' => random_int(1, $categories),
            'img' => $this->getImage(),
            'price' => 22.14,
            'start_datetime' => \Carbon\Carbon::now()->toDateTimeString(),
            'region' => 'Eindhoven'
        ], [
            'title' => 'zaal badminton ',
            'description' => $faker->text(220),
            'category_id' => random_int(1, $categories),
            'img' => $this->getImage(),
            'price' => 25.54,
            'start_datetime' => \Carbon\Carbon::now()->toDateTimeString(),
            'region' => 'Veldhoven'
        ],[
            'title' => 'buiten badminton ',
            'description' => $faker->text(220),
            'category_id' => random_int(1, $categories),
            'img' => $this->getImage(),
            'price' => 25.54,
            'start_datetime' => \Carbon\Carbon::now()->toDateTimeString(),
            'region' => 'Eindhoven'
        ],[
            'title' => 'zaalvolleybal',
            'description' => $faker->text(220),
            'category_id' => random_int(1, $categories),
            'img' => $this->getImage(),
            'price' => 12.45,
            'start_datetime' => \Carbon\Carbon::now()->toDateTimeString(),
            'region' => 'Eindhoven'
        ]]);
    }

    public function getImage()
    {
        $faker = Faker\Factory::create();

        $x = 1;
        $stringPath = '';

        while($x <= random_int(0, 4)) {
            if ($x == 1){
                $stringPath .= $faker->imageUrl(400, 300);
            } else{
                $stringPath .= ','.$faker->imageUrl(400, 300);
            }
            $x++;
        }

        return $stringPath;
    }
}
