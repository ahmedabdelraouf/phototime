<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TopMenu extends Model
{
    protected $table = "top_menus";
    protected $fillable = ["parent_id","title_en", "title_ar", "a_title_en", "a_title_ar", "url_en",
        "url_ar", "is_active"];

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
        foreach ($parents as $one){
            $child = $one->children()->where("is_active", "1")->get();
            $parent_data = [
                "title" => $one->{"title_". app()->getLocale()},
                "a_title" => $one->{"title_". app()->getLocale()},
                "url" => $one->{"url_". app()->getLocale()},
                "child" => []
            ];
            if($child->count() > 0){
                $child_data = [];
                foreach ($child as $children){
                    $child_data[] = [
                        "title" => $children->{"title_". app()->getLocale()},
                        "a_title" => $children->{"title_". app()->getLocale()},
                        "url" => $children->{"url_". app()->getLocale()},
                    ];
                }
                $parent_data["child"] = $child_data;
            }
            $return[] = $parent_data;
        }
        return $return;
    }
}
