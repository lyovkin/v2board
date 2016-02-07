<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CategoryRequest extends FormRequest
{
    protected $dontFlash = ['attachment'];

    public function rules()
    {

        return ['attachment' => 'image', //required|
            'title' => 'required|unique:categories,id,'.
                $this->get('id').'|min:3',
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
            'attachment.required' => 'Необходимо заполнить поле :attribute',
            'required' => 'Необходимо заполнить поле :attribute',
            'min' => 'Значение поля :attribute, должно быть не менье 3х символов',
        ];
    }
}