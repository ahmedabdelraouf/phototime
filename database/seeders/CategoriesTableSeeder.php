<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SlugAlias;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    public function storeCategory($categoryName)
    {
        $category = Category::create([
            "title" => $categoryName,
            "short_desc" => $categoryName,
            "meta_keywords" => $categoryName,
            "meta_title" => $categoryName,
            "meta_description" => $categoryName,
            "is_active" => 1,
            "image" => "categories/party.svg",
            "order" => 1,
        ]);
        SlugAlias::create(["module_id" => $category->id,
            "slug" => str_replace(" ", "-", $categoryName),
            "module" => Category::MODULE_NAME]);
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categoriesName = [
//            "فلاتر سناب شات",
//            "تغطية المعارض والمؤتمرات",
//            "إنتاج الافلام", "تصوير المنتجات",
//            "موشن جرافيك", "الحفلات والمهرجانات",
//            "التصوير الجوي", "بطاقات الدعوة والتهنئة",
//            "خدمة 1",
//            "خدمة 2",
//            "خدمة 3",
//            "خدمة 5",
//            "خدمة 6",
//            "خدمة 7",
//            "خدمة 8",
//            "خدمة 9",
//            "خدمة 10",
            "خدمة 11",
            "خدمة 12",
            "خدمة 13",
            "خدمة 14",
            "خدمة 15",
            "خدمة 16",
            "خدمة 17",
            "خدمة 18",
            "خدمة 19",
            "خدمة 10",
        ];
        foreach ($categoriesName as $categoryName) {
            $this->storeCategory($categoryName);
        }
    }
}
