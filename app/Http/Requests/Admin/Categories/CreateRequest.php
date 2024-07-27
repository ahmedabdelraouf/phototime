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
            "title" => "required",
            "slug" => "required|unique:slug_aliases,slug",
            "short_desc" => "required",
            "meta_keywords" => "nullable",
            "meta_title" => "nullable",
            "meta_description" => "nullable",
            "is_active" => "nullable",
            "image" => "nullable",
            "order" => "nullable",
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => !empty($this->is_active) ? 1 : 0,
        ]);
    }
}
