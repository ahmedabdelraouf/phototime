<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AlbumCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('album_categories')->delete();
        
        \DB::table('album_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'album_id' => 1,
                'category_id' => 2,
                'is_featured' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}