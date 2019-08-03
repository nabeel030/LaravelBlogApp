<?php

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
        $user = App\User::create([
          'name' => 'Nabeel Ahmed',
          'email' => 'na@gmail.com',
          'password' => bcrypt('password'),
          'admin' => 1
        ]);

        App\Profile::create([
          'user_id' => $user->id,
          'avatar' => 'uploads/users/user.png',
          'about' => 'This is admin',
          'facebook' => 'facebook.com',
          'youtube' => 'youtube.com',
        ]);
    }

}
