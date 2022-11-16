<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Имя',
            'email' => 'Email адрес',
            'password' => 'Пароль',
            'image' => 'Изображение'
        ];
    }

    public function messages(): array
    {
        return [
            //name
            'name.required' => ':attribute обязательно для заполнения',

            //email
            'email.required' => ':attribute обязателен для заполнения',
            'email.email' => ':attribute должен быть формата email',
            'email.unique' => ':attribute занят',

            //password
            'password.required' => ':attribute обязателен для заполнения',
            'password.confirmed' => ':attribute не совпадает с подтвержденным паролем',

            //image
            'image.required' => ':attribute обязательно для добавления',
            'image.image' => ':attribute должно быть формата png,jpg,jpeg',
            'image.mimes' => ':attribute должно быть формата png,jpg,jpeg',
            'image.max' => ':attribute не должно превышать 2мб'
        ];
    }
}
