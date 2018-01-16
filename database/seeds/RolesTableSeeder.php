<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles     = ['Super Administrator', 'Administrator', 'Customer', 'Store Manager', 'Contributor', 'Editor', 'Author'];
        $roles_arr = array();
        foreach ($roles as $role) {
            $roles_arr[] = [
                'name' => $role,
                'slug' => str_slug($role)
            ];
        }
        DB::table('roles')->insert($roles_arr);
    }
}
