<?php

use App\Activity;
use App\Event;
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
        $events = new Event;
        $activities = new Activity;

        foreach ($activities->get() as $activity) {
            $array = [];
            for($i = 0; $i < random_int(3, 7); $i++) {
                $start = $this->startTime();
                $array[] = [
                    'activity_id' => $activity->id,
                    'start_datetime' => $start,
                    'end_datetime' => $this->endTime($start),
                    'target_group' => $this->getTargetGroup(),
                    'price' => (int)rand(20, 60).'.'.rand(10, 99),
                ];
            }
            $events->insert($array);
        }
    }

    public function getTargetGroup()
    {
        $items = Event::getTargetGroup();

        return array_rand($items, 1);
    }

    public function startTime()
    {
        return \Carbon\Carbon::now()
            ->addDays(random_int(1, 14));
    }

    public function endTime($startTime)
    {
        return \Carbon\Carbon::parse($startTime)
            ->addHours(random_int(1, 3))
            ->addMinute(array_rand([15, 30, 45], 1));
    }
}
