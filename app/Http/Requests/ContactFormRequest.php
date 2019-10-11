<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
            'g-recaptcha-response' => 'recaptcha'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле обязательно для заполнения.',
            'email.required' => 'Поле обязательно для заполнения.',
            'message.required' => 'Поле обязательно для заполнения.',
            'name.max' => 'Поле может содержать максимум 50 символов.',
            'message.max' => 'Поле может содержать максимум 1000 символов.',
            'email.email' => 'Поле должно содержать валидный email.'
        ];
    }
}
