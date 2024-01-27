<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class YoutubeChannelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('youtube_channels')->delete();
        
        \DB::table('youtube_channels')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'حفل المعايدة السنوية لأسرة الشبانة 1444هـ - تغطية مجموعة فوتو تايم 21 الإعلامية',
                'image' => 'youtubechannel/00f96008f6052b266b452a6672126773.JPG.jpg',
                'url' => 'https://www.youtube.com/embed/31Ybb9VkDwk',
                'is_active' => 1,
                'created_at' => '2024-01-24 19:07:30',
                'updated_at' => '2024-01-24 19:50:24',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'حفل زواج الشاب / بدر بن جزاء المطيري - تغطية مجموعة فوتو تايم 21 الإعلامية',
                'image' => 'youtubechannel/4921dddd463db4960a6aea70134b2b70.JPG.jpg',
                'url' => 'https://www.youtube.com/embed/rMCC0WPz5Dk',
                'is_active' => 1,
                'created_at' => '2024-01-24 19:07:52',
                'updated_at' => '2024-01-24 19:51:04',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'حفل زواج الشاب / سعد بن متعب الحمادي - تغطية مجموعة فوتو تايم 21 الإعلامية',
                'image' => 'youtubechannel/4b73c9dc061f23ec027fe23adc8e017d.JPG.jpg',
                'url' => 'https://www.youtube.com/embed/V0EmU4xbN5M',
                'is_active' => 1,
                'created_at' => '2024-01-24 19:44:40',
                'updated_at' => '2024-01-24 19:51:39',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'حفل زواج الشاب / مصعب بن مطلق النفيعي - سينمائي - تغطية مجموعة فوتو تايم 21 الإعلامية',
                'image' => 'youtubechannel/1e1b4ac2837de3b5d63f77ce085b4db9.JPG.jpg',
                'url' => 'https://www.youtube.com/embed/_5FkPedpPzI',
                'is_active' => 1,
                'created_at' => '2024-01-24 19:45:16',
                'updated_at' => '2024-01-24 19:47:44',
            ),
        ));
        
        
    }
}