<?php

use App\Activity;
use App\Review;
use App\User;
use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $activities = new Activity;
        $reviews = new Review;
        $user = new User;

        $array = [];

        foreach ($activities->get() as $activity) {
            for($i = 0; $i < random_int(0, 7); $i++) {
                $array[] = [
                    'activity_id' => $activity->id,
                    'user_id' => random_int(1, $user->count()),
                    'text' => $faker->text(250),
                    'rating' => "{$this->randomRating()}",
                ];
            }
        }
        $reviews->insert($array);
    }

    public function randomRating()
    {
        $items = [0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5];

        return $items[rand(0, count($items) - 1)];
    }

}
