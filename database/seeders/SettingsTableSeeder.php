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
            ['key' => 'About_us', 'value' => 'logo.jpg', 'type' => 'image'],
            ['key' => 'whatsapp_phone', 'value' => '123-456-7890', 'type' => 'text'],
        ];

        // Insert data into the settings table
        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
