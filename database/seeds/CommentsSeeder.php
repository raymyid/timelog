<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seederSize = config('app.seeder_size.seeder_comments_size');

        // 先判断 posts 数量，太少则需要生成一些数据
        if (DB::table('posts')->count() < 50) {
            $this->call(PostsSeeder::class);
        }
        
        $faker = Faker\Factory::create();
        $users = DB::table('users')->pluck('id')->all();
        $posts = DB::table('posts')->pluck('id')->all();
        $comments = [];
        foreach (range(1, $seederSize) as $i)
        {
            $comment_post_id = $faker->randomElement($posts);
            $comment_user_id = $faker->randomElement($users);
            $comment_to_user_id = DB::table('posts')->where('id', $comment_post_id)->first()->post_user_id;
            // 生成匿名数据
            if ($i % 5 === 0) {
                $comment_user_id = 0;
            }

            $comments[] = [
                'id' => base_convert(uniqid(), 16, 10),
                'comment_post_id' => $comment_post_id,
                'comment_user_id' => $comment_user_id,
                'comment_to_user_id' => $comment_to_user_id,
                'comment_content' => $faker->text(222),
                'created_at' => $faker->dateTimeThisYear,
                'updated_at' => $faker->dateTimeThisYear
            ];
        }
        DB::table('comments')->insert($comments);
    }
}
