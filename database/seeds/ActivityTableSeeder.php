<?php

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
        \App\Activity::insert([[
            'value' => 'sport',
            'category_id' => null,
            'order' => 1
        ], [
            'value' => 'gaming',
            'category_id' => null,
            'order' => 3
        ], [
            'value' => 'culinair',
            'category_id' => null,
            'order' => 2
        ]]);

    }
}
