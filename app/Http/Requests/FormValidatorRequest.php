<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormValidatorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'text'=>'required|string|min:1|max:20',
            'email' => 'required|email',//regex:/^.+@.+$/i
            'phone' => 'required|numeric|min_digits:1|max_digits:15',
            'url' => 'required|url:http,https|active_url'
        ];
    }
}
