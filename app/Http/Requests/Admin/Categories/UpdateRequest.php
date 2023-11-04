<?php

namespace App\Http\Requests\Admin\Categories;

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
            "meta_keywords_ar" => "nullable",
            "meta_title_ar" => "nullable",
            "meta_description_ar" => "nullable",
            "title_en" => "nullable",
            "slug_en" => [
                'nullable',
                Rule::unique('slug_aliases',"slug")->ignore($id, "module_id"),
            ],
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
