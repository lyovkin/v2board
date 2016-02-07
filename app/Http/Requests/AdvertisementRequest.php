<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class AdvertisementRequest extends FormRequest
{
    protected $dontFlash = ['attachment'];

    public function rules()
    {

        return [
            'text' => 'required|min:3',
            'price' => 'integer',
            'phone' => 'integer',
            'category_id' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }

    /**
     * Set custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        //:values
        return [
            'text.required' => 'Введите описание',
            'title.min' => 'Заголовок слишком короткий',
            'text.min' => 'Описание слишком короткое',
            'price.required' => 'Введите цену',
            'price.integer' => 'Цена не может быть строкой',
            'phone.integer' => 'Телефон не может быть строкой',
            'category_id.required' => 'Выберете категорию',
        ];
    }
}