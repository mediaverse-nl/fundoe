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
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('asdasd'),
            'admin' => 1
        ]);

        for ($i=0; $i < 3; $i++) {
            User::create([
                'name' => str_random(8),
                'email' => str_random(12).'@mail.com',
                'password' => bcrypt('asdasd')
            ]);
        }
    }
}
