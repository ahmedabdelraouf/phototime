<?php

namespace App\Http\Requests\Admin\Albums;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, array|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required",
//            "slug" => "required|unique:slug_aliases,slug",
            "slug" => "nullable",
            "short_desc" => "nullable",
            "meta_keywords" => "nullable",
            "meta_title" => "nullable",
            "meta_description" => "nullable",
            "photo_date" => "nullable",
            "photo_owner_name" => "nullable",
            "album_number" => "nullable",
            "photo_place" => "nullable",
            "is_active" => "nullable",
            "is_featured" => "nullable",
            "youtube_url" => "nullable",
            "categories" => "nullable",
            "owner_phone" => "nullable",
            "default_image" => "required",
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => !empty($this->is_active) ? 1 : 0,
        ]);
    }
}
