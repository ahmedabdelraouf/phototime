<?php

namespace App\Http\Requests\Site;

use App\Models\UserMessage;
use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            "user_full_name" => "required|max:250",
            "user_email" => "required|email|max:250",
            "user_phone_number" => "required",
            "subject" => "required|max:250",
            "message" => "required|max:450",
            "type" => "nullable",
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'type' => UserMessage::TYPE_CONTACT_US,
        ]);
    }
}
