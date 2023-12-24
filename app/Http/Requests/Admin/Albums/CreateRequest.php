<?php

namespace App\Http\Requests\Admin\Albums;

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
     * @return array<string, array|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required",
            "slug" => "required|unique:slug_aliases,slug",
            "short_desc" => "required",
            "meta_keywords" => "required",
            "meta_title" => "required",
            "meta_description" => "required",
            "content" => "required",
            "photo_date" => "required|date",
            "photo_owner_name" => "required",
            "photo_place" => "required",
            "is_active" => "nullable",
            "categories" => "required",
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => !empty($this->is_active) ? 1 : 0,
        ]);
    }
}
