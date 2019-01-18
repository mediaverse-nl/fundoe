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
                    'text' => $faker->text(350),
                ];
            }
        }
        $reviews->insert($array);
    }
}
