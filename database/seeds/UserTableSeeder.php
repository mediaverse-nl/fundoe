<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('asdasd'),
            'admin' => 1
        ]);

        for ($i=0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => str_random(12).'@mail.com',
                'password' => bcrypt('asdasd')
            ]);
        }
    }
}
