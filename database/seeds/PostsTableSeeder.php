<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $users = App\Models\User::pluck('id')->all();
        $posts = [];

        DB::table('posts')->delete();

        foreach (range(1, 100) as $i)
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
