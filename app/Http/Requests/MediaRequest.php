<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ];
    }

    public function attributes(): array
    {
        return [
            'image' => 'Изображение'
        ];
    }

    public function messages(): array
    {
        return [
            //image
            'image.required' => ':attribute обязательно для добавления',
            'image.image' => ':attribute должно быть формата png, jpg, jpeg',
            'image.mimes' => ':attribute должно быть формата png, jpg, jpeg',
            'image.max' => ':attribute не должно превышать 2мб'
        ];
    }
}
