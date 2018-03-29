<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_ims = Role::where('name', 'ims')->first();
        $role_cms = Role::where('name', 'cms')->first();
        $role_member = Role::where('name', 'member')->first();

        $imsuser = new User();
        $imsuser->name = 'Dave Smith';
        $imsuser->email = 'dave@artmart.com';
        $imsuser->password = bcrypt('secret');
        $imsuser->save();
        $imsuser->roles()->attach($role_ims);

        $cmsuser = new User();
        $cmsuser->name = 'Jen Jones';
        $cmsuser->email = 'jen@artmart.com';
        $cmsuser->password = bcrypt('secret');
        $cmsuser->save();
        $cmsuser->roles()->attach($role_cms);

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@artmart.com';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_cms);
        $admin->roles()->attach($role_ims);
        $admin->roles()->attach($role_member);


        $member = new User();
        $member->name = 'Ben Fen';
        $member->email = 'ben@hotmail.com';
        $member->password = bcrypt('secret');
        $member->save();
        $member->roles()->attach($role_member);


        $stuff = factory(User::class, 20)->create(); 
    }
}
