<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TopMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('top_menus')->delete();
        
        \DB::table('top_menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'title' => 'تواصل معنا',
                'a_title' => 'تواصل معنا',
                'url' => '/contact-us',
                'is_active' => 1,
                'created_at' => '2023-12-16 20:44:37',
                'updated_at' => '2023-12-16 21:19:40',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'title' => 'من نحن',
                'a_title' => 'من نحن',
                'url' => '/about-us',
                'is_active' => 1,
                'created_at' => '2023-12-16 21:20:05',
                'updated_at' => '2023-12-27 10:20:19',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 0,
                'title' => 'Test pages',
                'a_title' => 'testpages',
                'url' => 'testpages',
                'is_active' => 0,
                'created_at' => '2023-12-25 00:56:16',
                'updated_at' => '2023-12-30 19:51:43',
            ),
        ));
        
        
    }
}