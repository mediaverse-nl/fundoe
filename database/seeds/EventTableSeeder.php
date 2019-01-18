<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities = \App\Activity::get();

        foreach ($activities as $activity){

            for($i = 0; $i < random_int(1, 5); $i++){
                $startTime = \Carbon\Carbon::now()
                    ->addDays(random_int(1, 14));

                $endTime = \Carbon\Carbon::parse($startTime)
                    ->addHours(random_int(1, 3))
                    ->addMinute(array_rand([15, 30, 45], 1));

                $activity->event()->insert([
                    'activity_id' => $activity->id,
                    'start_datetime' => $startTime,
                    'end_datetime' => $endTime,
                    'price' => rand(20, 60).'.'.rand(10, 99),
                ]);
            }
        }

    }
}
