<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'site_title',
                'value' => 'Phototime21',
                'type' => 'text',
                'created_at' => '2023-12-30 18:50:32',
                'updated_at' => '2023-12-30 18:50:32',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'site_meta_title',
                'value' => 'Phototime21',
                'type' => 'text',
                'created_at' => '2023-12-30 18:50:32',
                'updated_at' => '2023-12-30 18:51:03',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'site_description',
                'value' => 'Phototime21 description .',
                'type' => 'textarea',
                'created_at' => '2023-12-30 18:50:32',
                'updated_at' => '2023-12-30 18:50:32',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'site_meta_description',
                'value' => 'Phototime21 description.',
                'type' => 'textarea',
                'created_at' => '2023-12-30 18:50:32',
                'updated_at' => '2023-12-30 18:50:32',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'site_logo',
                'value' => 'settings/site_logo.svg',
                'type' => 'image',
                'created_at' => '2023-12-30 18:50:32',
                'updated_at' => '2023-12-30 18:51:03',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'site_bout_us_image',
                'value' => 'settings/site_bout_us_image.png',
                'type' => 'image',
                'created_at' => '2023-12-30 18:50:32',
                'updated_at' => '2023-12-30 18:51:03',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'whatsapp_phone',
                'value' => '56987455',
                'type' => 'text',
                'created_at' => '2023-12-30 18:50:32',
                'updated_at' => '2023-12-30 18:50:32',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'site_about_us_title_ar',
                'value' => 'مجموعة فوتو تايم 21 الإعلامية',
                'type' => 'text',
                'created_at' => '2023-12-30 18:50:32',
                'updated_at' => '2023-12-30 18:50:32',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'site_about_us_desc_ar',
                'value' => 'هي ليست مجموعة تضم أمهر المصورين والممنتجين وأكثرهم إبداعاً فحسب! بل هي أكثر من ذلك .. في عام 2013م اسست على يد شابين سعوديين تربطهما علاقة الأخوة والموهبة والطموح وخلال خمس سنوات وحتى الآن كونوا فريقاً من 15 شاباً يجمعهم نفس الطموح والشغف.',
                'type' => 'text',
                'created_at' => '2023-12-30 18:50:32',
                'updated_at' => '2023-12-30 18:50:32',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'site_about_us_title_en',
                'value' => 'Photo Time 21 Media Group',
                'type' => 'text',
                'created_at' => '2023-12-30 18:50:32',
                'updated_at' => '2023-12-30 18:50:32',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'site_about_us_desc_en',
                'value' => 'It is not only a group that includes the most skilled and creative photographers and producers! Rather, it is more than that.. In the year 2013 AD, it was founded by two young Saudis who have a relationship of brotherhood, talent, and ambition, and within five years until now, they have formed a team of 15 young men who share the same ambition and passion.',
                'type' => 'text',
                'created_at' => '2023-12-30 18:50:32',
                'updated_at' => '2023-12-30 18:50:32',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'site_services_title_ar',
                'value' => 'خدماتنا تغطي جميع المجالات؟',
                'type' => 'text',
                'created_at' => '2023-12-30 18:50:32',
                'updated_at' => '2023-12-30 18:50:32',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'site_services_desc_ar',
                'value' => 'نقدم خدمات عديدة ومتنوعة لتغطية كافة المناسبات والاحتفالات',
                'type' => 'text',
                'created_at' => '2023-12-30 18:50:32',
                'updated_at' => '2024-01-24 17:09:36',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'site_services_title_en',
                'value' => 'Our services cover all fields?',
                'type' => 'text',
                'created_at' => '2023-12-30 18:50:32',
                'updated_at' => '2023-12-30 18:50:32',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'site_services_desc_en',
                'value' => 'We provide many and varied services to cover all occasions and celebrations',
                'type' => 'text',
                'created_at' => '2023-12-30 18:50:32',
                'updated_at' => '2023-12-30 18:50:32',
            ),
        ));
        
        
    }
}