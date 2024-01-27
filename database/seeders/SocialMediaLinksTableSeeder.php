<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialMediaLinksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('social_media_links')->delete();
        
        \DB::table('social_media_links')->insert(array (
            0 => 
            array (
                'id' => 2,
                'title' => 'Snapchat',
                'image' => 'socialMediaLinks/snapchat.svg',
                'url' => 'https://www.instagram.com',
                'is_active' => 1,
                'created_at' => '2023-12-29 12:38:48',
                'updated_at' => '2023-12-29 13:45:49',
            ),
            1 => 
            array (
                'id' => 3,
                'title' => 'Youtube',
                'image' => 'socialMediaLinks/youtube.svg',
                'url' => 'https://www.youtube.com/',
                'is_active' => 1,
                'created_at' => '2023-12-30 20:10:41',
                'updated_at' => '2023-12-30 20:10:41',
            ),
            2 => 
            array (
                'id' => 4,
                'title' => 'Twitter',
                'image' => 'socialMediaLinks/x.svg',
                'url' => 'https://twitter.com/',
                'is_active' => 1,
                'created_at' => '2023-12-30 20:11:16',
                'updated_at' => '2023-12-30 20:11:16',
            ),
            3 => 
            array (
                'id' => 5,
                'title' => 'Whatsapp',
                'image' => 'socialMediaLinks/whatsapp.svg',
                'url' => 'https://web.whatsapp.com/',
                'is_active' => 1,
                'created_at' => '2023-12-30 20:12:43',
                'updated_at' => '2023-12-30 20:12:43',
            ),
            4 => 
            array (
                'id' => 6,
                'title' => 'Tiktok',
                'image' => 'socialMediaLinks/icons8-tiktok-50.svg',
                'url' => 'https://www.google.com/',
                'is_active' => 1,
                'created_at' => '2024-01-24 17:09:00',
                'updated_at' => '2024-01-24 17:09:00',
            ),
        ));
        
        
    }
}