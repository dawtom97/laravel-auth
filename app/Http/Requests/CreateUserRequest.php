<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:user,admin'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Imię jest wymagane.', 
            'email.required' => 'Email jest wymagany.',
            'email.email' => 'Email musi być poprawnym adresem email.',
            'email.unique' => 'Email już istnieje w bazie danych.',
            'password.required' => 'Hasło jest wymagane.', 
            'password.confirmed' => 'Hasła musza się zgadzać',
            'password.min' => 'Hasło musi mieć co najmniej 8 znaków.',
        ];
    }
}
