<?php

namespace App\Http\Requests\Admin\TopMenus;

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
        return [
            "title_ar" => "required",
            "title_en" => "required",
            "a_title_en" => "required",
            "a_title_ar" => "required",
            "url_en" => "required",
            "url_ar" => "required",
            "is_active" => "nullable",
            "parent_id" => "nullable",
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => !empty($this->is_active) ? 1 : 0,
            'parent_id' => !empty($this->parent_id) ? $this->parent_id : 0,
        ]);
    }
}
