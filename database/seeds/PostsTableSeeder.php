<?php

use Illuminate\Database\Seeder;

use Webpatser\Uuid\Uuid;

use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('posts')->delete();

        for ($i=0; $i < 100; $i++) {
            Post::create([
                'post_id'       =>  Uuid::generate(),
                'post_title'    =>  'Post-Title'.$i,
                'post_content'  =>  'Post-Content'.$i,
            ]);
        }
    }
}
