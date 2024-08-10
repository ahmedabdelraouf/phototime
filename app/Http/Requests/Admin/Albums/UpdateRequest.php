<?php

namespace App\Http\Requests\Admin\Albums;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

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
//            "slug" => [
//                'required',
//                Rule::unique('slug_aliases', "slug")->ignore($id, "module_id"),
//            ],
            "slug" => "nullable",
            "short_desc" => "nullable",
            "meta_keywords" => "nullable",
            "meta_title" => "nullable",
            "meta_description" => "nullable",
            "photo_date" => "nullable",
            "album_number" => "nullable",
            "photo_owner_name" => "nullable",
            "photo_place" => "nullable",
            "is_active" => "nullable",
            "is_featured" => "nullable",
            "is_public" => "nullable",
            "is_blocked" => "nullable",
            "youtube_url" => "nullable",
            "categories" => "nullable",
            "owner_phone" => "nullable",
            "default_image" => "nullable",

        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => !empty($this->is_active) ? 1 : 0,
        ]);
    }
}
