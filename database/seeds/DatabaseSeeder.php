<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(CategoryTableSeeder::class);
         $this->call(ActivityTableSeeder::class);
         $this->call(FaqTableSeeder::class);
         $this->call(EventTableSeeder::class);
         $this->call(ReviewTableSeeder::class);
    }
}
