<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TagsRequest extends FormRequest
{

    public function rules()
    {
        return [
            'tag_name' => 'required|min:3|unique:tags,id'. $this->get('id')
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
            'required' => 'Необходимо заполнить поле :attribute',
            'min' => 'Значение поля :attribute, должно быть не менье 3х символов',
        ];
    }
}