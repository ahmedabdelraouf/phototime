<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'فلاتر سناب شات',
                'short_desc' => 'فلاتر سناب شات',
                'meta_title' => 'فلاتر سناب شات',
                'meta_description' => 'فلاتر سناب شات',
                'meta_keywords' => 'فلاتر سناب شات',
                'image' => 'categories/snapshat.svg',
                'is_active' => 1,
                'created_at' => '2023-12-30 16:19:40',
                'updated_at' => '2023-12-30 16:20:30',
                'order' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'تغطية المعارض والمؤتمرات',
                'short_desc' => 'تغطية المعارض والمؤتمرات',
                'meta_title' => 'تغطية المعارض والمؤتمرات',
                'meta_description' => 'تغطية المعارض والمؤتمرات',
                'meta_keywords' => 'تغطية المعارض والمؤتمرات',
                'image' => 'categories/cenima.svg',
                'is_active' => 1,
                'created_at' => '2023-12-30 16:19:40',
                'updated_at' => '2023-12-30 16:20:44',
                'order' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'إنتاج الافلام',
                'short_desc' => 'إنتاج الافلام',
                'meta_title' => 'إنتاج الافلام',
                'meta_description' => 'إنتاج الافلام',
                'meta_keywords' => 'إنتاج الافلام',
                'image' => 'categories/film.svg',
                'is_active' => 1,
                'created_at' => '2023-12-30 16:19:40',
                'updated_at' => '2023-12-30 16:20:56',
                'order' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'تصوير المنتجات',
                'short_desc' => 'تصوير المنتجات',
                'meta_title' => 'تصوير المنتجات',
                'meta_description' => 'تصوير المنتجات',
                'meta_keywords' => 'تصوير المنتجات',
                'image' => 'categories/food.svg',
                'is_active' => 1,
                'created_at' => '2023-12-30 16:19:40',
                'updated_at' => '2023-12-30 16:22:33',
                'order' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'موشن جرافيك',
                'short_desc' => 'موشن جرافيك',
                'meta_title' => 'موشن جرافيك',
                'meta_description' => 'موشن جرافيك',
                'meta_keywords' => 'موشن جرافيك',
                'image' => 'categories/graphic.svg',
                'is_active' => 1,
                'created_at' => '2023-12-30 16:19:40',
                'updated_at' => '2023-12-30 16:21:47',
                'order' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'الحفلات والمهرجانات',
                'short_desc' => 'الحفلات والمهرجانات',
                'meta_title' => 'الحفلات والمهرجانات',
                'meta_description' => 'الحفلات والمهرجانات',
                'meta_keywords' => 'الحفلات والمهرجانات',
                'image' => 'categories/party.svg',
                'is_active' => 1,
                'created_at' => '2023-12-30 16:19:40',
                'updated_at' => '2023-12-30 16:21:28',
                'order' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'التصوير الجوي',
                'short_desc' => 'التصوير الجوي',
                'meta_title' => 'التصوير الجوي',
                'meta_description' => 'التصوير الجوي',
                'meta_keywords' => 'التصوير الجوي',
                'image' => 'categories/photo-air.svg',
                'is_active' => 1,
                'created_at' => '2023-12-30 16:19:40',
                'updated_at' => '2023-12-30 16:22:56',
                'order' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'بطاقات الدعوة والتهنئة',
                'short_desc' => 'بطاقات الدعوة والتهنئة',
                'meta_title' => 'بطاقات الدعوة والتهنئة',
                'meta_description' => 'بطاقات الدعوة والتهنئة',
                'meta_keywords' => 'بطاقات الدعوة والتهنئة',
                'image' => 'categories/wedding.svg',
                'is_active' => 1,
                'created_at' => '2023-12-30 16:19:40',
                'updated_at' => '2023-12-30 16:23:23',
                'order' => 1,
            ),
        ));
        
        
    }
}