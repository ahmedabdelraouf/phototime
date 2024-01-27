<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuccessPartnersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('success_partners')->delete();
        
        \DB::table('success_partners')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'google',
                'image' => 'successPartners/google.svg',
                'url' => 'https://www.google.com/',
                'is_active' => 1,
                'created_at' => '2023-12-29 14:32:52',
                'updated_at' => '2023-12-30 20:50:59',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Test youtube dashboard',
                'image' => 'successPartners/amazon.svg',
                'url' => 'https://www.youtube.com/',
                'is_active' => 1,
                'created_at' => '2023-12-29 14:33:24',
                'updated_at' => '2024-01-24 19:08:14',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'airbnb',
                'image' => 'successPartners/airbnb.svg',
                'url' => 'airbnb.com',
                'is_active' => 1,
                'created_at' => '2023-12-30 20:51:41',
                'updated_at' => '2023-12-30 20:51:41',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Uber-eats',
                'image' => 'successPartners/uber-eats.svg',
                'url' => 'ubner.com',
                'is_active' => 1,
                'created_at' => '2023-12-30 20:52:05',
                'updated_at' => '2023-12-30 20:52:05',
            ),
        ));
        
        
    }
}