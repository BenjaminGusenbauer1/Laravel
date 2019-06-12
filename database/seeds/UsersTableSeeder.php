<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'testuser';
        $user->email = 'test@gmail.com';
        $user->password = bcrypt('secret');
        $user->firstname = 'Kurt';
        $user->lastname = 'Keller';
        $user->admin = false;
        $user->save();

        $admin = new User;
        $admin->name = 'adminuser';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('admin');
        $admin->firstname = 'Benjamin';
        $admin->lastname = 'Gusenbauer';
        $admin->admin = true;
        $admin->save();

        $user1 = new User;
        $user1->name = 'testuser2';
        $user1->email = 'test2@gmail.com';
        $user1->password = bcrypt('secret');
        $user1->firstname = 'Lisa';
        $user1->lastname = 'Lustig';
        $user1->admin = false;
        $user1->save();
    }
}
