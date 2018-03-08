<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_ims = new Role();
        $role_ims->name = 'ims';
        $role_ims->description = 'an IMS user';
        $role_ims->save();

        $role_cms = new Role();
        $role_cms->name = 'cms';
        $role_cms->description = 'a CMS user';
        $role_cms->save();

        $role_cms = new Role();
        $role_cms->name = 'member';
        $role_cms->description = 'a site member';
        $role_cms->save();


        

    }
}
