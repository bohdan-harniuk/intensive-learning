<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Faker\Generator as Faker;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        
        $role_user = Role::whereName('User')->first();
        $role_author = Role::whereName('Author')->first();
        $role_admin = Role::whereName('Admin')->first();
        
        $user = new User();
        $user->name = 'Petro';
        $user->email = 'Petro@work.ua';
        $user->dob = Carbon\Carbon::parse('31 July 1995');
        $user->username = 'Petro';
        $user->password = 'secret';
        $user->save();
        $user->roles()->attach($role_user);
        
        $user = new User();
        $user->name = 'Kevin';
        $user->email = 'Kevin@work.ua';
        $user->dob = Carbon\Carbon::parse('31 July 1995');
        $user->username = 'Kevin';
        $user->password = 'secret';
        $user->save();
        $user->roles()->attach($role_admin);
        
        $user = new User();
        $user->name = 'Ivan';
        $user->email = 'Ivan@work.ua';
        $user->dob = Carbon\Carbon::parse('31 July 1995');
        $user->username = 'Ivan';
        $user->password = 'secret';
        $user->save();
        $user->roles()->attach($role_author);
        
    }
}
