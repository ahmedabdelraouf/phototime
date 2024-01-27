<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SliderBannersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('slider_banners')->delete();
        
        \DB::table('slider_banners')->insert(array (
            0 => 
            array (
                'id' => 1,
                'language' => 'ar',
                'title' => 'نرصد لكم لقطات لم تروها من قبل!',
                'description' => 'نحلق بكاميراتنا الطائرة لنرصد لكم لقطات علوية مميزة من زوايا لم تروها من قبل.',
                'image' => 'sliders/firstImage.jpg',
                'url' => 'http://139.59.123.11/contact-us',
                'btn_title' => 'إحجز الآن',
                'order' => 2,
                'is_active' => 1,
                'created_at' => '2023-12-16 20:41:01',
                'updated_at' => '2024-01-24 17:31:27',
            ),
            1 => 
            array (
                'id' => 2,
                'language' => 'ar',
                'title' => 'نرصد لكم لقطات لم تروها من قبل!',
                'description' => 'نحلق بكاميراتنا الطائرة لنرصد لكم لقطات علوية مميزة من زوايا لم تروها من قبل.',
                'image' => 'sliders/second.jpg',
                'url' => 'http://139.59.123.11/about-us',
                'btn_title' => 'من نحن',
                'order' => 2,
                'is_active' => 1,
                'created_at' => '2023-12-16 20:43:06',
                'updated_at' => '2023-12-29 13:47:59',
            ),
        ));
        
        
    }
}