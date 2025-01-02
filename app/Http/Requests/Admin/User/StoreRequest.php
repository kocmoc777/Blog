<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Це поле необхідне для заповнення',
            'name.string' => 'Імя має бути рядком',
            'email.required' => 'Це поле необхідне для заповнення',
            'email.string' => 'Пошта має бути рядком',
            'email.email' => 'Ваша пошта повинна відповідати формату mail@some.domain',
            'email.unique' => 'Користувач з таким email вже існує',
            'password.required' => 'Це поле необхідне для заповнення',
            'password.string' => 'Пароль має бути рядком',
        ];
    }

}
