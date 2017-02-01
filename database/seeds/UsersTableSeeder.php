<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('users')->delete();

        // admin
        User::create([
            'name'    =>  'admin',
            'email'  =>    'admin@email.com',
            'password' => '123',
        ]);

        for ($i=0; $i < 100; $i++) {
            User::create([
                'name'    =>  'name'.$i,
                'email'  =>    'email'.$i.'@email.com',
                'password' => 'namepwd',
            ]);
        }
    }
}
