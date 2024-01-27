<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'categories',
                'guard_name' => 'web',
                'created_at' => '2024-01-24 12:36:27',
                'updated_at' => '2024-01-24 12:36:27',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'dashboard',
                'guard_name' => 'web',
                'created_at' => '2024-01-24 12:36:36',
                'updated_at' => '2024-01-24 12:36:36',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'albums',
                'guard_name' => 'web',
                'created_at' => '2024-01-24 12:50:19',
                'updated_at' => '2024-01-24 12:50:19',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'sliderbanners',
                'guard_name' => 'web',
                'created_at' => '2024-01-24 12:50:41',
                'updated_at' => '2024-01-24 12:50:41',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'blog',
                'guard_name' => 'web',
                'created_at' => '2024-01-24 12:51:29',
                'updated_at' => '2024-01-24 12:51:29',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'socialmedialinks',
                'guard_name' => 'web',
                'created_at' => '2024-01-24 12:52:07',
                'updated_at' => '2024-01-24 12:52:07',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'successpartners',
                'guard_name' => 'web',
                'created_at' => '2024-01-24 12:52:53',
                'updated_at' => '2024-01-24 12:52:53',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'settings',
                'guard_name' => 'web',
                'created_at' => '2024-01-24 12:53:32',
                'updated_at' => '2024-01-24 12:53:32',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'topmenus',
                'guard_name' => 'web',
                'created_at' => '2024-01-24 12:53:57',
                'updated_at' => '2024-01-24 12:53:57',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'pages&linksdata',
                'guard_name' => 'web',
                'created_at' => '2024-01-24 12:54:49',
                'updated_at' => '2024-01-24 12:54:49',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'roles',
                'guard_name' => 'web',
                'created_at' => '2024-01-24 12:55:12',
                'updated_at' => '2024-01-24 12:55:12',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'admins',
                'guard_name' => 'web',
                'created_at' => '2024-01-24 12:55:33',
                'updated_at' => '2024-01-24 12:55:33',
            ),
        ));
        
        
    }
}