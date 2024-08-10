<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TopMenu extends Model
{
    protected $table = "top_menus";
    protected $fillable = ["parent_id", "title", "a_title", "url", "is_active"];

    const MODULE_NAME = "menus";

    function parent(): BelongsTo
    {
        return $this->belongsTo(TopMenu::class, "parent_id", "id");
    }

    function children(): HasMany
    {
        return $this->hasMany(TopMenu::class, "parent_id", "id");
    }

    static function getFullMenuStructure(): array
    {
        $return = [];
        $parents = self::where("is_active", 1)->where("parent_id", 0)->get();
        foreach ($parents as $one) {
            $child = $one->children()->where("is_active", "1")->get();
            $parent_data = [
                "title" => $one->title,
                "a_title" => $one->a_title,
                "url" => $one->url,
                "child" => []
            ];
            if ($child->count() > 0) {
                $child_data = [];
                foreach ($child as $children) {
                    $child_data[] = [
                        "title" => $children->title,
                        "a_title" => $children->a_title,
                        "url" => $children->url,
                    ];
                }
                $parent_data["child"] = $child_data;
            }
            $return[] = $parent_data;
        }


// New element to be added
        $newElement = [
            "title" => "المدونة",
            "a_title" => "المدونة",
            "url" => "/blogs",
            "child" => []
        ];

// Find the index of the first element with the url "/about-us"
        $aboutUsIndex = null;
        foreach ($return as $index => $item) {
            if ($item['url'] === '/about-us') {
                $aboutUsIndex = $index;
                break;
            }
        }

// Insert the new element before the "/about-us" element
        if ($aboutUsIndex !== null) {
            array_splice($return, $aboutUsIndex, 0, [$newElement]);
        }
        $return = array_reverse($return);

        $categories = self::getCategories();
        $categoriesElement = [
            "title" => "خدماتنا",
            "a_title" => "خدماتنا",
            "url" => "/",
            "child" => $categories
        ];

        array_unshift($return, $categoriesElement);

// Element to add at the start of the array
        $homeElement = [
            "title" => "الرئيسيه",
            "a_title" => "الرئيسيه",
            "url" => "/home",
            "child" => []
        ];
        array_unshift($return, $homeElement);
        return $return;
    }

    static function getCategories()
    {
        $categories = Category::all();
        $return = [];
        foreach ($categories as $category) {
            $return[] = [
                "title" => $category->title,
                "a_title" => $category->title,
                "image" => $category->image,
                "url" => "/category-info/$category->id",
            ];
        }
        return $return;
    }
}
