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

        // DB::table('users')->delete();

        $admin = [
            'id' => 10000,
            'username' => 'admin',
            'nickname' => 'admin',
            'password' => bcrypt('admin'),
            'created_at' => $faker->dateTimeThisYear,
            'updated_at' => $faker->dateTimeThisYear,
        ];

        if (is_null(DB::table('users')->where('id', 10000)->first())) {
            DB::table('users')->insert($admin);
        }

        foreach (range(1, 100) as $i)
        {
            $users[] = [
                'id' => base_convert(uniqid(), 16, 10),
                'username' => str_replace('.', '', $faker->userName),
                'nickname' => $faker->name,
                'email' => $faker->unique()->freeEmail,
                'avatar' => $faker->imageUrl(300, 300),
                'password' => bcrypt('password123'),
                'created_at' => $faker->dateTimeThisYear,
                'updated_at' => $faker->dateTimeThisYear,
            ];
        }

        DB::table('users')->insert($users);
    }
}
