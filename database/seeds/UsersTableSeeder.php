<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $users = factory(App\Models\User::class)->times(300)->make();
        // App\Models\User::insert($users->toArray());

        $faker = Faker\Factory::create();
        $users = [];

        DB::table('users')->delete();

        foreach (range(1, 100) as $i)
        {
            $users[] = [
                'id' => $faker->uuid,
                'username' => str_replace('.', '', $faker->userName),
                'nickname' => $faker->name,
                'email' => $faker->unique()->freeEmail,
                'avatar' => $faker->imageUrl(300, 300, 'cats'),
                'password' => bcrypt('123'),
                'remember_token' => str_random(10),
                'created_at' => $faker->dateTimeThisYear,
                'updated_at' => $faker->dateTimeThisYear,
            ];
        }

        DB::table('users')->insert($users);
    }
}
