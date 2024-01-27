<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'email' => 'admin@phototime.com',
                'password' => 'JDJ5JDEwJGs3ODAzdFVJZElPZkNqRXF4eUNGLnVENHNVWGNhU2dQQXE5dFdRL0kyNlF4YlIwNUFzcDI2',
                'name' => 'Super Admin',
                'is_active' => 1,
                'created_at' => '2023-12-16 20:37:47',
                'updated_at' => '2023-12-16 20:37:47',
            ),
        ));
        
        
    }
}