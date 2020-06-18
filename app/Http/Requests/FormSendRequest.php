<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormSendRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'userfile' => 'required|file'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Необходимо указать :attribute.',
            'email.required' => 'Поле E-mail должно быть заполнено',
            'userfile.required' => 'Необходимо выбрать файл'
        ];
    }

}
