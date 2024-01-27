<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AlbumImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('album_images')->delete();
        
        \DB::table('album_images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'album_id' => 1,
                'image' => 'albums/1/00f96008f6052b266b452a6672126773.JPG.jpg',
                'is_default' => 1,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'album_id' => 1,
                'image' => 'albums/1/00ffc44bf7c7c313f614665e56aaebba.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'album_id' => 1,
                'image' => 'albums/1/0a0ea5e153da1662d203cefdbf225464.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 3,
            ),
            3 => 
            array (
                'id' => 4,
                'album_id' => 1,
                'image' => 'albums/1/0c72e86c25af9e5facda6fbd22520ed4.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 4,
            ),
            4 => 
            array (
                'id' => 5,
                'album_id' => 1,
                'image' => 'albums/1/0e50e2e400988808a69e9b71395e172f.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 5,
            ),
            5 => 
            array (
                'id' => 6,
                'album_id' => 1,
                'image' => 'albums/1/0M8A0436.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'album_id' => 1,
                'image' => 'albums/1/1bbfbe8a81c333fb9c7dce2330467264.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 7,
            ),
            7 => 
            array (
                'id' => 8,
                'album_id' => 1,
                'image' => 'albums/1/1c342643ae0cd39c3814fd485a441a71.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 8,
            ),
            8 => 
            array (
                'id' => 9,
                'album_id' => 1,
                'image' => 'albums/1/1e1b4ac2837de3b5d63f77ce085b4db9.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 9,
            ),
            9 => 
            array (
                'id' => 10,
                'album_id' => 1,
                'image' => 'albums/1/1fb9b8e01c4a573d1412e70ac942d160.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 10,
            ),
            10 => 
            array (
                'id' => 11,
                'album_id' => 1,
                'image' => 'albums/1/1fce5d86f26a155c75ffa4c7495751d0.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 11,
            ),
            11 => 
            array (
                'id' => 12,
                'album_id' => 1,
                'image' => 'albums/1/02ebbe68c437fd2b3411a0236e98f394.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 12,
            ),
            12 => 
            array (
                'id' => 13,
                'album_id' => 1,
                'image' => 'albums/1/2a552d6b9ea2a0bd6eeea42aaa51ebfe.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 13,
            ),
            13 => 
            array (
                'id' => 14,
                'album_id' => 1,
                'image' => 'albums/1/2b41faad7a5e2a366f5717f9eb5af30e.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 14,
            ),
            14 => 
            array (
                'id' => 15,
                'album_id' => 1,
                'image' => 'albums/1/2c724682285b77ce26521ca4fd9eb3f2.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 15,
            ),
            15 => 
            array (
                'id' => 16,
                'album_id' => 1,
                'image' => 'albums/1/2d311c24ba328b083a2c7b0ee9b48760.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 16,
            ),
            16 => 
            array (
                'id' => 17,
                'album_id' => 1,
                'image' => 'albums/1/2e3f07b8f6bc287680febdffd624806c.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 17,
            ),
            17 => 
            array (
                'id' => 18,
                'album_id' => 1,
                'image' => 'albums/1/3c784804d2336e1e2f21afa09b18df55.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 18,
            ),
            18 => 
            array (
                'id' => 19,
                'album_id' => 1,
                'image' => 'albums/1/3da99b24ac4fe5dd827a0ba645ffd3c4.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 19,
            ),
            19 => 
            array (
                'id' => 20,
                'album_id' => 1,
                'image' => 'albums/1/3e55b3b8ad4760ddc699350e95a3994c.JPG.jpg',
                'is_default' => 0,
                'is_active' => 1,
                'created_at' => '2024-01-24 16:58:05',
                'updated_at' => '2024-01-24 16:58:26',
                'order' => 20,
            ),
        ));
        
        
    }
}