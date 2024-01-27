<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SlugAliasesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('slug_aliases')->delete();
        
        \DB::table('slug_aliases')->insert(array (
            0 => 
            array (
                'id' => 1,
                'module_id' => 1,
                'slug' => 'testpages44testpages',
                'module' => 'pages',
                'created_at' => '2023-12-16 21:32:16',
                'updated_at' => '2024-01-24 17:59:42',
            ),
            1 => 
            array (
                'id' => 2,
                'module_id' => 2,
                'slug' => 'about-us',
                'module' => 'pages',
                'created_at' => '2023-12-16 21:35:08',
                'updated_at' => '2023-12-16 21:35:08',
            ),
            2 => 
            array (
                'id' => 3,
                'module_id' => 3,
                'slug' => 'testpages',
                'module' => 'pages',
                'created_at' => '2023-12-25 00:54:59',
                'updated_at' => '2023-12-25 00:54:59',
            ),
            3 => 
            array (
                'id' => 5,
                'module_id' => 1,
                'slug' => 'testpages44testpages',
                'module' => 'blog',
                'created_at' => '2023-12-29 15:56:29',
                'updated_at' => '2023-12-29 15:56:29',
            ),
            4 => 
            array (
                'id' => 8,
                'module_id' => 1,
                'slug' => 'httpswwwyoutubecom',
                'module' => 'album',
                'created_at' => '2023-12-29 21:23:47',
                'updated_at' => '2023-12-29 21:23:47',
            ),
            5 => 
            array (
                'id' => 9,
                'module_id' => 2,
                'slug' => 'dffvdhfjvg',
                'module' => 'album',
                'created_at' => '2023-12-30 13:52:02',
                'updated_at' => '2023-12-30 13:52:02',
            ),
            6 => 
            array (
                'id' => 21,
                'module_id' => 1,
                'slug' => 'فلاتر-سناب-شات',
                'module' => 'categories',
                'created_at' => '2023-12-30 18:19:40',
                'updated_at' => '2023-12-30 18:19:40',
            ),
            7 => 
            array (
                'id' => 22,
                'module_id' => 2,
                'slug' => 'تغطية-المعارض-والمؤتمرات',
                'module' => 'categories',
                'created_at' => '2023-12-30 18:19:40',
                'updated_at' => '2023-12-30 18:19:40',
            ),
            8 => 
            array (
                'id' => 23,
                'module_id' => 3,
                'slug' => 'إنتاج-الافلام',
                'module' => 'categories',
                'created_at' => '2023-12-30 18:19:40',
                'updated_at' => '2023-12-30 18:19:40',
            ),
            9 => 
            array (
                'id' => 24,
                'module_id' => 4,
                'slug' => 'تصوير-المنتجات',
                'module' => 'categories',
                'created_at' => '2023-12-30 18:19:40',
                'updated_at' => '2023-12-30 18:19:40',
            ),
            10 => 
            array (
                'id' => 25,
                'module_id' => 5,
                'slug' => 'موشن-جرافيك',
                'module' => 'categories',
                'created_at' => '2023-12-30 18:19:40',
                'updated_at' => '2023-12-30 18:19:40',
            ),
            11 => 
            array (
                'id' => 26,
                'module_id' => 6,
                'slug' => 'الحفلات-والمهرجانات',
                'module' => 'categories',
                'created_at' => '2023-12-30 18:19:40',
                'updated_at' => '2023-12-30 18:19:40',
            ),
            12 => 
            array (
                'id' => 27,
                'module_id' => 7,
                'slug' => 'التصوير-الجوي',
                'module' => 'categories',
                'created_at' => '2023-12-30 18:19:40',
                'updated_at' => '2023-12-30 18:19:40',
            ),
            13 => 
            array (
                'id' => 28,
                'module_id' => 8,
                'slug' => 'بطاقات-الدعوة-والتهنئة',
                'module' => 'categories',
                'created_at' => '2023-12-30 18:19:40',
                'updated_at' => '2023-12-30 18:19:40',
            ),
            14 => 
            array (
                'id' => 29,
                'module_id' => 9,
                'slug' => 'خدمة-1',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:40',
                'updated_at' => '2023-12-30 19:15:40',
            ),
            15 => 
            array (
                'id' => 30,
                'module_id' => 10,
                'slug' => 'خدمة-2',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:40',
                'updated_at' => '2023-12-30 19:15:40',
            ),
            16 => 
            array (
                'id' => 31,
                'module_id' => 11,
                'slug' => 'خدمة-3',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:40',
                'updated_at' => '2023-12-30 19:15:40',
            ),
            17 => 
            array (
                'id' => 32,
                'module_id' => 12,
                'slug' => 'خدمة-5',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:40',
                'updated_at' => '2023-12-30 19:15:40',
            ),
            18 => 
            array (
                'id' => 33,
                'module_id' => 13,
                'slug' => 'خدمة-6',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:40',
                'updated_at' => '2023-12-30 19:15:40',
            ),
            19 => 
            array (
                'id' => 34,
                'module_id' => 14,
                'slug' => 'خدمة-7',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:40',
                'updated_at' => '2023-12-30 19:15:40',
            ),
            20 => 
            array (
                'id' => 35,
                'module_id' => 15,
                'slug' => 'خدمة-8',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:40',
                'updated_at' => '2023-12-30 19:15:40',
            ),
            21 => 
            array (
                'id' => 36,
                'module_id' => 16,
                'slug' => 'خدمة-9',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:40',
                'updated_at' => '2023-12-30 19:15:40',
            ),
            22 => 
            array (
                'id' => 37,
                'module_id' => 17,
                'slug' => 'خدمة-10',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:40',
                'updated_at' => '2023-12-30 19:15:40',
            ),
            23 => 
            array (
                'id' => 38,
                'module_id' => 18,
                'slug' => 'خدمة-11',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:40',
                'updated_at' => '2023-12-30 19:15:40',
            ),
            24 => 
            array (
                'id' => 39,
                'module_id' => 19,
                'slug' => 'خدمة-12',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:40',
                'updated_at' => '2023-12-30 19:15:40',
            ),
            25 => 
            array (
                'id' => 40,
                'module_id' => 20,
                'slug' => 'خدمة-13',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:40',
                'updated_at' => '2023-12-30 19:15:40',
            ),
            26 => 
            array (
                'id' => 41,
                'module_id' => 21,
                'slug' => 'خدمة-14',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:40',
                'updated_at' => '2023-12-30 19:15:40',
            ),
            27 => 
            array (
                'id' => 42,
                'module_id' => 22,
                'slug' => 'خدمة-15',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:40',
                'updated_at' => '2023-12-30 19:15:40',
            ),
            28 => 
            array (
                'id' => 43,
                'module_id' => 23,
                'slug' => 'خدمة-16',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:40',
                'updated_at' => '2023-12-30 19:15:40',
            ),
            29 => 
            array (
                'id' => 44,
                'module_id' => 24,
                'slug' => 'خدمة-17',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:40',
                'updated_at' => '2023-12-30 19:15:40',
            ),
            30 => 
            array (
                'id' => 45,
                'module_id' => 25,
                'slug' => 'خدمة-18',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:41',
                'updated_at' => '2023-12-30 19:15:41',
            ),
            31 => 
            array (
                'id' => 46,
                'module_id' => 26,
                'slug' => 'خدمة-19',
                'module' => 'categories',
                'created_at' => '2023-12-30 19:15:41',
                'updated_at' => '2023-12-30 19:15:41',
            ),
            32 => 
            array (
                'id' => 49,
                'module_id' => 3,
                'slug' => 'ghrcjvthfcchg',
                'module' => 'album',
                'created_at' => '2023-12-30 22:17:26',
                'updated_at' => '2023-12-30 22:17:26',
            ),
            33 => 
            array (
                'id' => 50,
                'module_id' => 4,
                'slug' => 'hvjgvtjytvjy',
                'module' => 'album',
                'created_at' => '2023-12-30 22:18:43',
                'updated_at' => '2023-12-30 22:18:43',
            ),
            34 => 
            array (
                'id' => 51,
                'module_id' => 5,
                'slug' => 'gfvjyvj',
                'module' => 'album',
                'created_at' => '2023-12-30 22:19:45',
                'updated_at' => '2023-12-30 22:19:45',
            ),
            35 => 
            array (
                'id' => 52,
                'module_id' => 6,
                'slug' => 'tvjyvjvytv',
                'module' => 'album',
                'created_at' => '2023-12-30 22:20:31',
                'updated_at' => '2023-12-30 22:20:31',
            ),
            36 => 
            array (
                'id' => 53,
                'module_id' => 10,
                'slug' => 'vutvutvujtvutyv',
                'module' => 'album',
                'created_at' => '2024-01-23 21:54:40',
                'updated_at' => '2024-01-23 21:54:40',
            ),
            37 => 
            array (
                'id' => 54,
                'module_id' => 11,
                'slug' => 'vyvytllllllll',
                'module' => 'album',
                'created_at' => '2024-01-23 21:55:28',
                'updated_at' => '2024-01-23 21:55:28',
            ),
            38 => 
            array (
                'id' => 55,
                'module_id' => 12,
                'slug' => 'vyvytllllllllcontaining-lorem-ipsum-passages-and-more-recently-with-desktop-publis',
                'module' => 'album',
                'created_at' => '2024-01-23 21:56:00',
                'updated_at' => '2024-01-23 21:56:00',
            ),
            39 => 
            array (
                'id' => 56,
                'module_id' => 13,
                'slug' => 'ctrybuhnictyubijokpl',
                'module' => 'album',
                'created_at' => '2024-01-24 12:48:44',
                'updated_at' => '2024-01-24 12:48:44',
            ),
            40 => 
            array (
                'id' => 57,
                'module_id' => 14,
                'slug' => 'gcfjtvjtvhtrvhtrcyhtrv',
                'module' => 'album',
                'created_at' => '2024-01-24 13:23:12',
                'updated_at' => '2024-01-24 13:23:12',
            ),
            41 => 
            array (
                'id' => 58,
                'module_id' => 15,
                'slug' => 'testpagesssssdcdssssssss',
                'module' => 'album',
                'created_at' => '2024-01-24 16:34:41',
                'updated_at' => '2024-01-24 16:34:41',
            ),
            42 => 
            array (
                'id' => 59,
                'module_id' => 1,
                'slug' => 'احتفال-أهالي-أشيقر-بـ-عيد-الفطر-المبارك-1444هـ',
                'module' => 'album',
                'created_at' => '2024-01-24 16:57:42',
                'updated_at' => '2024-01-24 16:57:42',
            ),
            43 => 
            array (
                'id' => 60,
                'module_id' => 4,
                'slug' => 'success-partners',
                'module' => 'pages',
                'created_at' => '2024-01-24 18:44:27',
                'updated_at' => '2024-01-24 18:45:06',
            ),
        ));
        
        
    }
}