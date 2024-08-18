<?php

namespace App\Http\Requests\Admin\SliderBanners;

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
            "language" => "nullable",
            "title" => "required",
            "description" => "required",
            "image" => "nullable",
            "url" => "required",
            "btn_title" => "required",
            "order" => "required",
            "is_active" => "nullable",
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
