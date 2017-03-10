<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seederSize = config('app.seeder_size.seeder_posts_size');

        // 先判断 users 数量，太少则需要生成一些数据
        if (DB::table('users')->count() < 50) {
            $this->call(UsersSeeder::class);
        }
        
        $faker = Faker\Factory::create();
        $users = DB::table('users')->pluck('id')->all();
        $posts = [];
        foreach (range(1, $seederSize) as $i)
        {
            $posts[] = [
                'id' => base_convert(uniqid(), 16, 10),
                'post_user_id' => $faker->randomElement($users),
                'post_title' => $faker->sentence,
                'post_content' => $faker->text(2222),
                'created_at' => $faker->dateTimeThisYear,
                'updated_at' => $faker->dateTimeThisYear,
            ];
        }
        DB::table('posts')->insert($posts);
    }
}
