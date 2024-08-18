<?php

namespace App\Http\Requests\Admin\SliderBanners;

use App\Models\SliderBanner;
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
            "btn_title" => "required",
            "title" => "required",
            "description" => "required",
            "image" => "required",
            "url" => "required",
            "order" => "nullable",
            "is_active" => "nullable",
        ];
    }

    protected function prepareForValidation(): void
    {
        $order = SliderBanner::max("order");
        $this->merge([
            'is_active' => !empty($this->is_active) ? 1 : 0,
            'order' => $order + 1,
            'language' => "ar",
        ]);
    }
}
