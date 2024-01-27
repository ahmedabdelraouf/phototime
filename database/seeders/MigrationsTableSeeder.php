<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'migration' => '2019_12_14_000001_create_personal_access_tokens_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'migration' => '2023_08_27_003100_create_slug_aliases_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'migration' => '2023_09_09_201012_create_top_menus_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'migration' => '2023_09_12_191038_create_sliders_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'migration' => '2023_09_12_212411_create_pages_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'migration' => '2023_09_23_093857_create_admins_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'migration' => '2023_09_23_093955_create_admin_sessions_table',
                'batch' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'migration' => '2023_11_04_183823_create_categories_table',
                'batch' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'migration' => '2023_11_04_184256_create_album_images_table',
                'batch' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'migration' => '2023_11_04_184403_create_albums_table',
                'batch' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'migration' => '2023_11_04_184522_create_album_categories_table',
                'batch' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'migration' => '2023_11_26_202315_create_user_messages_table',
                'batch' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'migration' => '2023_12_24_065639_update_categories_table',
                'batch' => 2,
            ),
            13 => 
            array (
                'id' => 14,
                'migration' => '2023_12_24_070848_update_albums_table',
                'batch' => 2,
            ),
            14 => 
            array (
                'id' => 16,
                'migration' => '2023_12_28_225146_create_social_media_links_table',
                'batch' => 3,
            ),
            15 => 
            array (
                'id' => 17,
                'migration' => '2023_12_29_140241_create_success_partners_table',
                'batch' => 4,
            ),
            16 => 
            array (
                'id' => 20,
                'migration' => '2023_12_29_115806_create_blogs_table',
                'batch' => 5,
            ),
            17 => 
            array (
                'id' => 21,
                'migration' => '2023_12_29_183752_add_column_to_categories_table',
                'batch' => 6,
            ),
            18 => 
            array (
                'id' => 23,
                'migration' => '2023_12_29_190010_create_settings_table',
                'batch' => 7,
            ),
            19 => 
            array (
                'id' => 25,
                'migration' => '2023_12_29_205212_add_column_to_albums_table',
                'batch' => 8,
            ),
            20 => 
            array (
                'id' => 26,
                'migration' => '2023_12_30_123842_create_permission_tables',
                'batch' => 9,
            ),
            21 => 
            array (
                'id' => 27,
                'migration' => '2024_01_23_211428_add_new_columns_to_albums',
                'batch' => 10,
            ),
            22 => 
            array (
                'id' => 28,
                'migration' => '2024_01_24_133426_add_colmn_order_to_album_images',
                'batch' => 11,
            ),
            23 => 
            array (
                'id' => 29,
                'migration' => '2024_01_24_185636_create_youtube_channels_table',
                'batch' => 12,
            ),
        ));
        
        
    }
}