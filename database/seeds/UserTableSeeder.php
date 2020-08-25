<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{

    private function userExists($email)
    {
        return User::where('email', $email)->first() !== null;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $basicUserEmail =  'user@user.com';
        $adminUserEmail = 'admin@admin.com';
        if (!$this->userExists($basicUserEmail)) {
            $user = new User();
            $user->name = 'user';
            $user->email = $basicUserEmail;
            $user->password = Hash::make('password');
            $user->role = 'user';
            $user->save();
        }

        if(!$this->userExists($adminUserEmail)) {
            $admin = new User();
            $admin->name = 'admin';
            $admin->email = 'admin@admin.com';
            $admin->password = Hash::make('password');
            $admin->role = 'admin';
            $admin->save();
        }
    }
}
