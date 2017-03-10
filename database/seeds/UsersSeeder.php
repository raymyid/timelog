<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seederSize = config('app.seeder_size.seeder_users_size');

        // Crate admin account
        $this->call(UsersAdminSeeder::class);

        // Create test account
        $faker = Faker\Factory::create();
        $users = [];
        // Loop build sql
        foreach (range(1, $seederSize) as $i)
        {
            $users[] = [
                'id' => base_convert(uniqid(), 16, 10),
                'username' => str_replace('.', '', $faker->userName),
                'nickname' => $faker->name,
                'email' => $faker->unique()->freeEmail,
                'avatar' => $faker->imageUrl(300, 300),
                'password' => bcrypt('password'),
                'created_at' => $faker->dateTimeThisYear,
                'updated_at' => $faker->dateTimeThisYear,
            ];
        }
        // One-time insert
        DB::table('users')->insert($users);
    }
}
