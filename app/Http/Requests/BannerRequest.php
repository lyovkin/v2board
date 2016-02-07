<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class BannerRequest extends FormRequest
{
    protected $dontFlash = ['attachment'];

    
        // if(preg_match_all('/edit/', $this->server('HTTP_REFERER')) == true)
        // {
        //     $this->rules['upl'] = 'max:10000|image|mimes:jpeg,jpg,bmp,png,gif';
        // }
    

    protected $rules = [
        'link' => 'required|min:2|url',
        'text' => 'required|min:2',
        'upl'   => 'required|image|max:10000|mimes:jpeg,jpg,bmp,png,gif'
    ];

    public function rules()
    {
        if(preg_match_all('/edit/', $this->server('HTTP_REFERER')))
        {
            $this->rules['upl'] = 'max:10000|image|mimes:jpeg,jpg,bmp,png,gif';
        }
        return $this->rules;
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
            'title.required' => 'Введите заголовок',
            'text.required' => 'Введите описание',
            'title.min' => 'Заголовок слишком короткий',
            'text.min' => 'Описание слишком короткое',
            'upl' => 'Выберите картинку',

        ];
    }
}