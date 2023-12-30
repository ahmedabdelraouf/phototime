<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed some initial settings
        $settings = [
            ['key' => 'site_title', 'value' => 'Phototime21', 'type' => 'text'],
            ['key' => 'site_meta_title', 'value' => 'Phototime21 ', 'type' => 'text'],
            ['key' => 'site_description', 'value' => 'Phototime21 description .', 'type' => 'textarea'],
            ['key' => 'site_meta_description', 'value' => 'Phototime21 description.', 'type' => 'textarea'],
            ['key' => 'site_logo', 'value' => 'logo.jpg', 'type' => 'image'],
            ['key' => 'site_bout_us_image', 'value' => 'logo.jpg', 'type' => 'image'],
            ['key' => 'whatsapp_phone', 'value' => '123-456-7890', 'type' => 'text'],
            //site about us information
            ['key' => 'site_about_us_title_ar', 'value' => 'مجموعة فوتو تايم 21 الإعلامية', 'type' => 'text'],
            ['key' => 'site_about_us_desc_ar', 'value' => 'هي ليست مجموعة تضم أمهر المصورين والممنتجين وأكثرهم إبداعاً فحسب! بل هي أكثر من ذلك .. في عام 2013م اسست على يد شابين سعوديين تربطهما علاقة الأخوة والموهبة والطموح وخلال خمس سنوات وحتى الآن كونوا فريقاً من 15 شاباً يجمعهم نفس الطموح والشغف.', 'type' => 'text'],
            ['key' => 'site_about_us_title_en', 'value' => 'Photo Time 21 Media Group', 'type' => 'text'],
            ['key' => 'site_about_us_desc_en', 'value' => 'It is not only a group that includes the most skilled and creative photographers and producers! Rather, it is more than that.. In the year 2013 AD, it was founded by two young Saudis who have a relationship of brotherhood, talent, and ambition, and within five years until now, they have formed a team of 15 young men who share the same ambition and passion.', 'type' => 'text'],

            //site Services information
            ['key' => 'site_services_title_ar', 'value' => 'خدماتنا تغطي جميع المجالات؟', 'type' => 'text'],
            ['key' => 'site_services_desc_ar', 'value' => 'نقدم خدمات عديدة ومتنوعة لتغطية كافة المناسبات والاحتفالات', 'type' => 'text'],
            ['key' => 'site_services_title_en', 'value' => 'Our services cover all fields?', 'type' => 'text'],
            ['key' => 'site_services_desc_en', 'value' => 'We provide many and varied services to cover all occasions and celebrations', 'type' => 'text'],

        ];

        // Insert data into the settings table
        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
