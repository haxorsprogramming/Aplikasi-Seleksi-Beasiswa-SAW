<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserModel;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createUser("admin", "ADMIN", "admin");
    }
    function createUser($username, $role, $password)
    {
        $newUser = new UserModel();
        $newUser->username = $username;
        $newUser->role = $role;
        $newUser->password = password_hash($password, PASSWORD_DEFAULT);
        $newUser->active = "1";
        $newUser->save();
    }
}
