<?php

namespace App\Http\Requests\Admin\Pages;

use App\Models\Page;
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
            "language" => "nullable",
            "type" => "nullable",
            "title" => "required",
            "slug" => "required|unique:slug_aliases,slug",
            "short_desc" => "required",
            "meta_keywords" => "required",
            "meta_title" => "required",
            "meta_description" => "required",
            "content" => "required",
            "is_active" => "nullable",
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => !empty($this->is_active) ? 1 : 0,
            'language' => "ar",
            'type' => Page::PAGE_TYPE_SLUG
        ]);
    }
}
