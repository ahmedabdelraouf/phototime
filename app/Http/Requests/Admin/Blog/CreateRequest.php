<?php

namespace App\Http\Requests\Admin\Blog;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "language" => "nullable",
            "type" => "nullable",
            "title" => "required|max:255",
            "slug" => "required|unique:slug_aliases,slug",
            "short_desc" => "required:max:500",
            "meta_keywords" => "required|max:255",
            "meta_title" => "required|max:255",
            "meta_description" => "required|max:255",
            "content" => "required|max:10000",
            "is_active" => "nullable",
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:1000',           
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => !empty($this->is_active) ? 1 : 0,
            'language' => "ar",
        ]);
    }
}
