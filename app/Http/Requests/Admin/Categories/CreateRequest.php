<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title_ar" => "required",
            "slug_ar" => "required|unique:slug_aliases,slug",
            "short_desc_ar" => "required",
            "meta_keywords_ar" => "required",
            "meta_title_ar" => "required",
            "meta_description_ar" => "required",
            "title_en" => "nullable",
            "slug_en" => "nullable|unique:slug_aliases,slug",
            "short_desc_en" => "nullable",
            "meta_keywords_en" => "nullable",
            "meta_title_en" => "nullable",
            "meta_description_en" => "nullable",
            "is_active" => "nullable",
            "image" => "nullable",
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => !empty($this->is_active) ? 1 : 0,
        ]);
    }
}
