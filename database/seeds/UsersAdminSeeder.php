<?php

use Illuminate\Database\Seeder;

class UsersAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
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
    }
}
