<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'name' => 'admin', 'role' => 'admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('admin@123')],
            ['id' => 2, 'name' => 'editor', 'role' => 'editor', 'email' => 'editor@gmail.com', 'password' => bcrypt('editor@123')],
            ['id' => 3, 'name' => 'reader', 'role' => 'reader', 'email' => 'reader@gmail.com', 'password' => bcrypt('reader@123')],
        ];
    
        User::insert($users);
    }
}
