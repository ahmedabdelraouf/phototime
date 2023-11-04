<?php

namespace App\Http\Requests\Admin\Pages;

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
            "title_ar" => "required",
            "slug_ar" => [
                'required',
                Rule::unique('slug_aliases',"slug")->ignore($id, "module_id"),
            ],
            "short_desc_ar" => "required",
            "meta_keywords_ar" => "required",
            "meta_title_ar" => "required",
            "meta_description_ar" => "required",
            "content_ar" => "required",
            "title_en" => "required",
            "slug_en" => [
                'required',
                Rule::unique('slug_aliases',"slug")->ignore($id, "module_id"),
            ],
            "short_desc_en" => "required",
            "meta_keywords_en" => "required",
            "meta_title_en" => "required",
            "meta_description_en" => "required",
            "content_en" => "required",
            "is_active" => "nullable",
            "posts" => "nullable",
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => !empty($this->is_active) ? 1 : 0,
        ]);
    }
}
