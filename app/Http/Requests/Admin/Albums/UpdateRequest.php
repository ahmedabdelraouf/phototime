<?php

namespace App\Http\Requests\Admin\Albums;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = $this->route("id");
        return [
            "title" => "required",
//            "slug" => "required|unique:slug_aliases,slug",
            "slug" => [
                'required',
                Rule::unique('slug_aliases', "slug")->ignore($id, "module_id"),
            ],
            "short_desc" => "required",
            "meta_keywords" => "required",
            "meta_title" => "required",
            "meta_description" => "required",
            "photo_date" => "required|date",
            "photo_owner_name" => "required",
            "photo_place" => "required",
            "is_active" => "nullable",
            "is_featured" => "nullable",
            "youtube_url" => "nullable",
            "categories" => "required",
            "owner_phone" => "nullable",

//            "menu_title" => "required",
//            "title_ar" => "required",
//            "slug_ar" => [
//                'required',
//                Rule::unique('slug_aliases', "slug")->ignore($id, "module_id"),
//            ],
//            "short_desc_ar" => "required",
//            "meta_keywords_ar" => "required",
//            "meta_title_ar" => "required",
//            "meta_description_ar" => "required",
//            "content_ar" => "required",
//            "title_en" => "nullable",
//            "slug_en" => 'nullable',
//            "short_desc_en" => "nullable",
//            "meta_keywords_en" => "nullable",
//            "meta_title_en" => "nullable",
//            "meta_description_en" => "nullable",
//            "content_en" => "nullable",
//            "is_active" => "nullable",
//            "posts" => "nullable",
//            "image" => "nullable",
//            "youtube_url" => "nullable",
//            "categories" => "required",
//            "owner_phone" => "nullable",
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => !empty($this->is_active) ? 1 : 0,
        ]);
    }
}
